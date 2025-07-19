<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\Instagram;
use App\Models\Newsletter;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->orderBy('created_at')->get();
        $newArrivals = Product::where('is_new_arrival', true)->where('is_active', true)->orderBy('created_at')->get();
        $bestSellers = Product::where('is_best_selling', true)->where('is_active', true)->orderBy('created_at')->get();
        $isRecommended = Product::where('is_recommended', true)->where('is_active', true)->orderBy('created_at')->get();
        $testimonials = Testimonial::all();
        $winterCollectionThumbnail = Product::where('season', 'winter')->where('is_active', true)->orderBy('created_at')->first();
        $video = Video::orderBy('created_at')->first();
        $instagramImages = Instagram::all();

        return view('index', compact('categories', 'newArrivals', 'bestSellers', 'isRecommended', 'testimonials', 'winterCollectionThumbnail', 'video', 'instagramImages'));
    }

    public function shop()
    {
        $allProducts = Product::orderBy('created_at')->paginate(9);
        $allCategories = Category::orderBy('created_at')->get();
        return view('shop', compact('allProducts', 'allCategories'));
    }

    public function contact(Request $request)
    {
        if ($request->isMethod("post"))
        {
            $validated = $request->validate([
                'email' => 'required|email|unique:contacts,email',
                'message' => 'nullable|string|',
            ]);

            if ($validated)
            {
                Contact::create($validated);
                return redirect()->route('home.contact')->with('success', 'Your Message Have Been Submitted, Our Team will contact you soon!');
            }

            else {
                return redirect()->route('home.contact')->with('error', 'Can not send your message, please check your email address!');
            // return view('contact')->with('error', 'Can not send your message, please check your email address!');
            }
        }
        if ($request->isMethod('get'))
        {
            return view('contact');
        }
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function search_results(Request $request)
    {
        $search = $request->input('search');

        $products = Product::query()->when($search, function ($query, $search){
            $query->where('name', 'like', "%{$search}%")
            ->orWhereHas('category', function($q) use ($search){
                $q->where('name', 'like', "%{$search}%");
            });
        })->paginate(9);

        $total = $products->total();
        return view('search_results', compact('products', 'search', 'total'));
    }

     public function cart()
    {
        return view('cart');
    }

    public function newsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validated)
        {
            Newsletter::create($validated);
            return back()->with('success', 'You have subscribed for newsletter successfully');
        }

        else {
            return back()->with('error', 'Please Enter a valid email address!');
        }
    }

    public function shopByCategory(string $slug)
    {
        $allCategories = Category::orderBy('created_at')->get();
        $category = Category::where('slug', $slug)->firstOrFail();
        $allProducts = Product::where('category_id', $category->id)->orderBy('created_at')->paginate(9);
        return view('shop', compact('allProducts', 'allCategories'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id]))
        {
            $cart[$id]['quantity']++;
        }
        else 
        {
            $cart[$id] = [
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', "Product Added To Cart!");
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        
        if (!isset($cart[$id]))
        {
            return redirect()->back()->with('error', 'Product not Found in Cart!');
        }
        if($request->action === 'increment')
        {
            $cart[$id]['quantity']+=1;
        }
        else if ($request->action === 'decrement')
        {
            $cart[$id]['quantity']-=1;

            // If quantity becomes 0 or less, remove the product from the cart
            if ($cart[$id]['quantity'] <= 0)
             {
              unset($cart[$id]);   
            }
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart Updated');
    }

    public function clearCart()
    {
        session()->forget('cart'); 
        return redirect()->back()->with('success', 'Cart has been cleared!');
    }

    public function productShow($id)
    {
        $product = Product::findOrFail($id);
        return view('product-show', compact('product'));
    }

    public function orderSuccess()
    {
        return view('order_success');
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'zip' =>  'required|string|max:10',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);

        if ($validated){

            $cart = session('cart');

            if (!$cart || count($cart) == 0)
            {
                 return redirect()->back()->with('error', "Your Cart is Empty!");
            }

        // calculate total price

            $total = 0;

        foreach($cart as $item)
        {
            $price = $item['discounted_price'] ?? $item['price'];
            $total += $price * $item['quantity'];
        }

        //Create order

        // $order = new Order();
        // $order->user_id = Auth::check() ? Auth::id() : null;
        // $order->fname = $request->input('fname');
        // $order->lname = $request->input('lname');
        // $order->email = $request->input('email');
        // $order->phone = $request->input('phone');
        // $order->address = $request->input('address');
        // $order->city = $request->input('city');
        // $order->zip = $request->input('zip');
        // $order->state = $request->input('state');
        // $order->country = $request->input('country');
        // $order->total_price = $total;
        // $order->payment_method = $request->input('payment_method');
        // $order->status = 'pending';
        // $order->save();

        $order = new Order();
        $order->user_id = Auth::check() ? Auth::id() : null;
        $order->fname = $validated['fname'];
        $order->lname = $validated['lname'];
        $order->email = $validated['email'];
        $order->phone = $validated['phone'];
        $order->address = $validated['address'];
        $order->city = $validated['city'];
        $order->zip = $validated['zip'];
        $order->state = $validated['state'];
        $order->country = $validated['country'];
        $order->total_price = $total;
        $order->payment_method = $validated['payment_method'];
        $order->status = 'pending';
        $order->save();


        foreach($cart as $id => $item)
        {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['discounted_price'] ?? $item['price'];
            $orderItem->save();
        }

        // clear the cart after creating order
        Session::forget('cart');

        return redirect()->route('home.orderSuccess')->with('success', "Order Has Been Placed Successfully!");
    }
    else {
        return redirect()->back()->with('error', 'Validation failed!');
    }
    }
}
