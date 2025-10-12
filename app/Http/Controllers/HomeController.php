<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\About;
use App\Models\Blog;
use App\Models\Slide;
use App\Models\Review;
use App\Models\Message;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\BlogComment;
use App\Models\Deal;
use App\Models\Property;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::latest()->paginate(3);
        $carAdvert = Car::where('subscription_type', 'Premium')->latest()->first();
        $carAdvertImages = $carAdvert->carAdvert ?? collect();
        $properties = Property::latest()->paginate(3);
        $products = Deal::latest()->paginate(3);
        $houseAdvert = Property::where('subscription_type', 'Premium')->latest()->first();

        $setting = Setting::first();
        $slides = Slide::oldest()->get();
        $about = About::first();
        return view('frontend.home',[
            'cars'=>$cars,
            'carAdvert'=>$carAdvert,
            'carAdvertImages'=>$carAdvertImages,
            'properties'=>$properties,
            'houseAdvert'=>$houseAdvert,
            'products'=>$products,
            'setting'=>$setting,
            'slides'=>$slides,
            'about'=>$about,
            
        ]);

    }
   
    public function about(){
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.about',[
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }
   
    public function pricing(){
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.pricing',[
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }
   
    public function connect(){
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.contact',[
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }
   
    public function terms(){
        $about = About::first();
        $setting = Setting::first();
        $cars = Car::all();
        $properties = Property::all();
        $deals = Deal::all();
        $recentProducts = Deal::latest()->paginate(12);

        return view('frontend.terms',[
            'about'=>$about,
            'setting'=>$setting,
            'cars'=>$cars,
            'properties'=>$properties,
            'deals'=>$deals,
            'recentProducts'=>$recentProducts,
            ]);
    }
    public function cars(){
        $cars = Car::latest()->paginate(9);
        $carAdvert = Car::where('subscription_type', 'Premium')->latest()->first();
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.cars',[
            'cars'=>$cars,
            'carAdvert'=>$carAdvert,
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }

    public function car($slug){
        $car = Car::where('slug',$slug)->firstOrFail();
        $carAdvert = Car::where('subscription_type', 'Premium')->latest()->first();
        $allAdverts = Car::where('subscription_type', 'Premium')->where('id','!=',$carAdvert->id)->latest()->get();
        $images = $car->images ?? collect();
        $setting = Setting::first();
        $about = About::first();
        $car->increment('views');
        return view('frontend.car',[
            'car'=>$car,
            'carAdvert'=>$carAdvert,
            'allAdverts'=>$allAdverts,
            'images'=>$images,
            'setting'=>$setting,
            'about'=>$about,
        ]);
    }
    public function services(){
        $services = Service::oldest()->paginate(3);
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.services',[
            'services'=>$services,
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }

public function service($slug)
{
    $service = Service::where('slug', $slug)->firstOrFail();
    $otherServices = Service::where('id', '!=', $service->id)->latest()->get();
    $images = $service->images ?? collect(); 
    $setting = Setting::first();
    $about = About::first();
    
    return view('frontend.service', [
        'service' => $service,
        'otherServices' => $otherServices,
        'images' => $images,
        'setting' => $setting,
        'about' => $about,
    ]);
}


    public function propertySearch(){
        $properties = Property::latest()->paginate(9);
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.propertySearch',[
            'properties'=>$properties,
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }

    public function properties(){
        $properties = Property::latest()->paginate(9);
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.properties',[
            'properties'=>$properties,
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }
    
    public function property($slug){
        $property = Property::where('slug',$slug)->firstOrFail();
        $propertyAdvert = Property::where('subscription_type', 'Premium')->latest()->first();
        $allAdverts = Property::where('subscription_type', 'Premium')->where('id','!=',$propertyAdvert->id)->latest()->get();
        $images = $property->images ?? collect();
        $setting = Setting::first();
        $about = About::first();
        $property->increment('views');
        return view('frontend.property',[
            'property'=>$property,
            'propertyAdvert'=>$propertyAdvert,
            'allAdverts'=>$allAdverts,
            'images'=>$images,
            'setting'=>$setting,
            'about'=>$about,
        ]);
    }

    public function projects(){
        $properties = Property::latest()->paginate(9);
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.projects',[
            'properties'=>$properties,
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }
    
    public function project($slug){
        $property = Property::where('slug',$slug)->firstOrFail();
        $propertyAdvert = Property::where('subscription_type', 'Premium')->latest()->first();
        $allAdverts = Property::where('subscription_type', 'Premium')->where('id','!=',$propertyAdvert->id)->latest()->get();
        $images = $property->images ?? collect();
        $setting = Setting::first();
        $about = About::first();
        $property->increment('views');
        return view('frontend.project',[
            'property'=>$property,
            'propertyAdvert'=>$propertyAdvert,
            'allAdverts'=>$allAdverts,
            'images'=>$images,
            'setting'=>$setting,
            'about'=>$about,
        ]);
    }
    public function products(){
        $products = Deal::latest()->paginate(9);
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.products',[
            'products'=>$products,
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }

        
    public function product($slug){
    $product = Deal::where('slug', $slug)->firstOrFail();

    $productAdvert = Deal::where('subscription_type', 'Premium')->latest()->first();

    $allAdverts = collect(); 

    if ($productAdvert) {
        $allAdverts = Deal::where('subscription_type', 'Premium')
            ->where('id', '!=', $productAdvert->id)
            ->latest()
            ->get();
    }

    $images = $product->images ?? collect();
    $setting = Setting::first();
    $about = About::first();
    $product->increment('views');
    return view('frontend.product', [
        'product' => $product,
        'productAdvert' => $productAdvert,
        'allAdverts' => $allAdverts,
        'images' => $images,
        'setting' => $setting,
        'about' => $about,
    ]);
}
    public function blogs(){
        $products = Blog::latest()->paginate(9);
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.blogs',[
            'products'=>$products,
            'about'=>$about,
            'setting'=>$setting,
            ]);
    }

        
    public function blog($slug){
    $product = Blog::where('slug', $slug)->firstOrFail();

    $productAdvert = Deal::where('subscription_type', 'Premium')->latest()->first();

    $allAdverts = collect(); 

    if ($productAdvert) {
        $allAdverts = Deal::where('subscription_type', 'Premium')
            ->where('id', '!=', $productAdvert->id)
            ->latest()
            ->get();
    }

    $images = $product->images ?? collect();
    $setting = Setting::first();
    $about = About::first();
    $product->increment('views');
    return view('frontend.blog', [
        'product' => $product,
        'productAdvert' => $productAdvert,
        'allAdverts' => $allAdverts,
        'images' => $images,
        'setting' => $setting,
        'about' => $about,
    ]);
}


    public function logouts()
    {
        Auth::logout();
        return redirect()->route('home');
    }



    public function subscribe(Request $request) {
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('subscribers', 'email'),
            ],
        ]);

        $email = $request->input('email');

        $subscribed = Subscriber::create([
            'email' => $email,
        ]);


        if($subscribed){
            //$subscriber = Subscriber::where('email', $email)->firstOrFail();
            //Mail::to("mukizaemma34@gmail.com")->send(new NewSubscriberNotification($subscriber));
    
            return redirect()->back()->with('success', 'Thank you for subscribing to M&E Properties, we will get back to you');
        }

        else{
            return redirect()->back()->with('error', 'Something Went Wrong. Try again later!');
        }        
    
    }
   

    public function sendMessage(Request $request) {
        $validatedData = $request->validate([
            'names' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
    
        // Now create the message with the validated data
        $message = Message::create($validatedData);  // Pass validated data
    
        // Mail::to("mukizaemma34@gmail.com")->send(new MessageNotification($message));
    
        return redirect()->back()->with('success', 'Thank you for reaching out... we will get back to you soon');
    }
    
    

    public function testimony(Request $request){

        $review = Review::create([
            'names' => $request->input('names'),
            'email' => $request->input('email'),
            'testimony' => $request->input('testimony'),
        ]);
    
        if (!$review) {
            return redirect()->back()->with('error', 'Failed to submit your testimony. Please try again.');
        }
    
        return redirect()->back()->with('success', 'Your testimony has submitted successfully!');
    }

    public function sendComment(Request $request) {
        $user = auth()->user();
    
        $comment = BlogComment::create([
            'blog_id' => $request->input('blog_id'),
            'names' => $request->input('names'),
            'email' => $request->input('email'),
            'comment' => $request->input('comment'),
            'user_id' => $user ? $user->id : null,
        ]);
    
        if ($comment) {
            // Mail::to('mukizaemma34@gmail.com')->send(new BlogCommentsNotofications($comment));
            return redirect()->back()->with('success', 'Comment added successfully');
        }
    
        else{
            return redirect()->back()->with('error', 'Failed to add the comment. Please try again.');
        }
    }


}
