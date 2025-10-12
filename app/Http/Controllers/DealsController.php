<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use App\Models\Dealimage;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Propertyimage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DealsController extends Controller
{
    public function index()
    {
    
        $properties = Deal::with('category')->latest()->get();
        $services = Category::all();
        $subscriptions = Subscription::latest()->get();
        $setting = Setting::first();    
        return view('admin.products.index', [
            'properties' => $properties,
            'categories' => $services,
            'subscriptions' => $subscriptions,
            'setting' => $setting,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $fileName = '';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('public/images/products');
            $fileName = basename($path);
        }
    
        $slug = Str::of($request->input('title'))->slug();
    
        $product = new Deal();
        $product->title = $request->input('title');
        $product->currency = $request->input('currency');
        $product->price = $request->input('price');
        $product->location = $request->input('location');
        $product->subscription_id = $request->input('subscription_id');
        $product->subscription_type = $request->input('subscription_type');
        $product->description = $request->input('description');
        $product->contact = $request->input('contact');
        $product->condition = $request->input('condition');
        $product->listing_type = $request->input('listing_type');
        $product->category_id = $request->input('category_id');
        $product->image = $fileName;
        $product->slug = $slug;
        $product->added_by = $request->user()->id;
        
        $saved = $product->save();
    
        if ($saved) {
        return redirect()->route('getDeals')->with('success', 'New Product has been saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }

    }
    
    public function edit($id)
    {
        $product = Deal::with('category')->findOrFail($id);
        $services = Category::all();
        $subscriptions = Subscription::latest()->get();
        $images = $product->images ?? collect();
        $totalImages = $images->count();
        return view('admin.products.productUpdate', [
            'product'=>$product,
            'categories'=>$services,
            'subscriptions'=>$subscriptions,
            'images'=>$images,
            'totalImages'=>$totalImages,
        ]);
    }
    public function view($id)
    {
        $product = Deal::find($id);
        return view('admin.posts.blogView', [
            'service'=>$product,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Deal::findOrFail($id);
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('public/images/products');
                Storage::delete('public/images/products/' . $product->image);
                $product->image = basename($path);
            }
    
            $fields = ['title', 'email', 'phone','address','description','listing_type','subscription_type','status','added_by',
            'currency','price','advertType','condition','location','contact','category_id','subscription_id'];
            foreach ($fields as $field) {
                if ($request->has($field) && $request->input($field) !== $product->$field) {
                    $product->$field = $request->input($field);
                }
            }
    
            if ($product->isDirty('title')) {
                $slug = Str::of($product->title)->slug();
                if (Deal::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                    $slug .= '-' . uniqid();
                }
                $product->slug = $slug;
            }
    
            $product->save();

    
            return redirect()->route('getDeals')->with('success', 'Product has been updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function destroy($id)
    {
        $product = Deal::find($id); 
        if (!$product) {
            return back()->with('error', 'Content not found');
        }
        if ($product->image) {
            Storage::delete('public/images/products/' . $product->image);
        }
        $product->delete($id);
        return back()
            ->with('success', 'Product deleted successfully');
    }

    public function addDealImage(Request $request)
        {
            $request->validate([
                'image.*'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
                'deal_id' => 'required|exists:deals,id',
            ]);

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $dir = 'public/images/products';
                    $path = $image->store($dir);
                    $fileName = str_replace($dir . '/', '', $path);

                    Dealimage::create([
                        'image'             => $fileName,
                        'deal_id' => $request->deal_id, 
                        'added_by' => $request->user()->id
                    ]);
                }

                return redirect()->back()->with('success', 'Images uploaded successfully!');
            }

            return redirect()->back()->with('error', 'No images were uploaded.');
        }

    public function deleteDealImage($id){
        $image = Dealimage::findOrFail($id);

        $imagePath = 'public/images/products/' . $image->filename;

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $image->delete();

        return redirect()->back()->with('warning', 'Image has been deleted');
    }
}
