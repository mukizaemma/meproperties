<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Property;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Propertyimage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PropertiesController extends Controller
{
    public function index()
    {
    
        $properties = Property::latest()->get();
        $subscriptions = Subscription::latest()->get();
        $setting = Setting::first();    
        return view('admin.properties.index', [
            'properties' => $properties,
            'subscriptions' => $subscriptions,
            'setting' => $setting,
        ]);
    }

public function store(Request $request): RedirectResponse
{
    // Handle image upload
    $fileName = '';
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('public/images/properties');
        $fileName = basename($path);
    }

    // Generate slug from title
    $slug = Str::of($request->input('title'))->slug('-');

    // Create new property
    $property = new Property();
    $property->title = $request->input('title');
    $property->slug = $slug;
    $property->image = $fileName;
    $property->description = $request->input('description');

    // Core Filters
    $property->listing_type = $request->input('listing_type');
    $property->category = $request->input('category');

    // Location
    $property->city = $request->input('city');
    $property->other_city = $request->input('other_city');
    $property->location = $request->input('location');

    // Property Details
    $property->property_type = $request->input('property_type');
    $property->bedrooms = $request->input('bedrooms');
    $property->bathrooms = $request->input('bathrooms');
    $property->parking = $request->input('parking');

    // Price & Currency
    $property->currency = $request->input('currency');
    $property->price = $request->input('price') ?? 0;

    // Extra Info
    $property->furnished_status = $request->input('furnished_status');
    $property->contact = $request->input('contact');
    $property->email = $request->input('email');

    // Relations
    $property->added_by = $request->user()->id;

    // Default values
    $property->status = 'New'; // ensure initial status
    $property->views = 0;

    // Optional relationships if you plan to attach later
    $property->subscription_id = null;
    $property->amenity_id = null;
    $property->subscription_type = null;

    // Save property
    $saved = $property->save();

    if ($saved) {
        return redirect()->route('getProperties')
            ->with('success', 'New Property has been saved successfully.');
    } else {
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again later.');
    }
}
    
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $images = $property->images ?? collect();
        $totalImages = $images->count();
        $subscriptions = Subscription::latest()->get();
        return view('admin.properties.update', [
            'property'=>$property,
            'images'=>$images,
            'totalImages'=>$totalImages,
            'subscriptions'=>$subscriptions,
        ]);
    }
    public function view($id)
    {
        $property = Property::find($id);
        return view('admin.posts.blogView', [
            'service'=>$property,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $property = Property::findOrFail($id);
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('public/images/properties');
                Storage::delete('public/images/properties/' . $property->image);
                $property->image = basename($path);
            }
    
            $fields = ['title', 'email', 'phone','address','description','listing_type','property_type','subscription_type','status','added_by',
            'currency','price','parking','upi','location','contact','bedrooms','bathrooms','furnished_status','subscription_id'];
            foreach ($fields as $field) {
                if ($request->has($field) && $request->input($field) !== $property->$field) {
                    $property->$field = $request->input($field);
                }
            }
    
            if ($property->isDirty('title')) {
                $slug = Str::of($property->title)->slug();
                if (Property::where('slug', $slug)->where('id', '!=', $property->id)->exists()) {
                    $slug .= '-' . uniqid();
                }
                $property->slug = $slug;
            }
    
            $property->save();

    
            return redirect()->route('getProperties')->with('success', 'Property has been updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function destroy($id)
    {
        $property = Property::find($id); 
        if (!$property) {
            return back()->with('error', 'Content not found');
        }
        if ($property->image) {
            Storage::delete('public/images/properties/' . $property->image);
        }
        $property->delete($id);
        return back()
            ->with('success', 'House deleted successfully');
    }

    public function addPropertyImage(Request $request)
        {
            $request->validate([
                'image.*'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
                'property_id' => 'required|exists:properties,id',
            ]);

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $dir = 'public/images/properties';
                    $path = $image->store($dir);
                    $fileName = str_replace($dir . '/', '', $path);

                    Propertyimage::create([
                        'image'             => $fileName,
                        'property_id' => $request->property_id, 
                        'added_by' => $request->user()->id
                    ]);
                }

                return redirect()->back()->with('success', 'Images uploaded successfully!');
            }

            return redirect()->back()->with('error', 'No images were uploaded.');
        }

    public function deletePropertyImage($id){
        $image = Propertyimage::findOrFail($id);

        $imagePath = 'public/images/properties/' . $image->filename;

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $image->delete();

        return redirect()->back()->with('warning', 'Image has been deleted');
    }
}
