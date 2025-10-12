<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Setting;
use App\Models\Carimage;
use App\Models\Cartype;
use App\Models\Subscription;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function index()
    {
    
        $cars = Car::latest()->get();
        $carTypes = Cartype::all();
        $subscriptions = Subscription::latest()->get();
        $setting = Setting::first();    
        return view('admin.cars.index', [
            'cars' => $cars,
            'setting' => $setting,
            'carTypes' => $carTypes,
            'subscriptions' => $subscriptions,
        ]);
    }
    
    public function store(Request $request): RedirectResponse
    {
        $fileName = '';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('public/images/cars');
            $fileName = basename($path);
        }
    
        $slug = Str::of($request->input('title'))->slug();
    
        $car = new Car();
        $car->title = $request->input('title');
        $car->cartype_id = $request->input('cartype_id');
        $car->advertType = $request->input('advertType');
        $car->subscription_type = $request->input('subscription_type');
        $car->price = $request->input('price');
        $car->currency = $request->input('currency');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->doors = $request->input('doors');
        $car->mileage = $request->input('mileage');
        $car->engineType = $request->input('engineType');
        $car->transmission = $request->input('transmission');
        $car->subscription_id = $request->input('subscription_id');
        $car->description = $request->input('description');
        $car->contact = $request->input('contact');
        $car->image = $fileName;
        $car->slug = $slug;
        $car->added_by = $request->user()->id;
        
        $saved = $car->save();
    
        if ($saved) {
        return redirect()->route('getCars')->with('success', 'New Car has been saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }

    }
    
    public function edit($id)
    {
        $car = Car::with('type')->findOrFail($id);
        $carTypes  = Cartype::with('cars')->get();
        $images = $car->images ?? collect();
        $totalImages = $images->count();
        $subscriptions = Subscription::latest()->get();
        return view('admin.cars.update', [
            'car'=>$car,
            'carTypes'=>$carTypes,
            'images'=>$images,
            'totalImages'=>$totalImages,
            'subscriptions'=>$subscriptions,
        ]);
    }
    public function view($id)
    {
        $car = Room::find($id);
        $program= Room::all();
        return view('admin.posts.blogView', [
            'service'=>$car,
            'program'=>$program,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $car = Car::findOrFail($id);
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('public/images/cars');
                Storage::delete('public/images/cars/' . $car->image);
                $car->image = basename($path);
            }
    
            $fields = ['title', 'email', 'phone','address','description','model','year','subscription_type','status','added_by','cartype_id',
            'currency','price','currency','engineType','advertType','location','contact','transmission','doors','ownerTel','subscription_id'];
            foreach ($fields as $field) {
                if ($request->has($field) && $request->input($field) !== $car->$field) {
                    $car->$field = $request->input($field);
                }
            }
    
            if ($car->isDirty('title')) {
                $slug = Str::of($car->title)->slug();
                if (Car::where('slug', $slug)->where('id', '!=', $car->id)->exists()) {
                    $slug .= '-' . uniqid();
                }
                $car->slug = $slug;
            }
    
            $car->save();
    
            return redirect()->route('getCars')->with('success', 'Car has been updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function destroy($id)
    {
        $car = Car::find($id); 
        if (!$car) {
            return back()->with('error', 'Content not found');
        }
        if ($car->image) {
            Storage::delete('public/images/cars/' . $car->image);
        }
        $car->delete($id);
        return back()
            ->with('success', 'Car deleted successfully');
    }

            
    public function addCarImage(Request $request)
        {
            $request->validate([
                'image.*'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
                'car_id' => 'required|exists:cars,id',
            ]);

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $dir = 'public/images/cars';
                    $path = $image->store($dir);
                    $fileName = str_replace($dir . '/', '', $path);

                    Carimage::create([
                        'image'             => $fileName,
                        'car_id' => $request->car_id, 
                        'added_by' => $request->user()->id
                    ]);
                }

                return redirect()->back()->with('success', 'Images uploaded successfully!');
            }

            return redirect()->back()->with('error', 'No images were uploaded.');
        }

    public function deleteCarImage($id){
        $image = Carimage::findOrFail($id);

        $imagePath = 'public/images/cars/' . $image->filename;

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $image->delete();

        return redirect()->back()->with('warning', 'Image has been deleted');
    }
}
