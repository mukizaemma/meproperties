<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
        public function index()
    {
        $services = Service::oldest()->get();
        return view('admin.services.index',[
            'services'=>$services,
        ]);
    }

public function store(Request $request)
{
    $fileName = null;

    // Handle image upload if it exists
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/images/services');
        $fileName = basename($path);
    }

    // Create the service
    $service = new Service();
    $service->name = $request->input('name');
    $service->description = $request->input('description');
    $service->slug = Str::slug($request->input('name'));
    $service->image = $fileName;
    $saved = $service->save();

    // Redirect based on result
    if ($saved) {
        return redirect()->route('getServices')->with('success', 'Service created successfully.');
    } else {
        return back()->with('error', 'Something went wrong.');
    }
}

    
    public function edit(string $id)
    {
        $service = Service::find($id);
        return view('admin.services.serviceUpdate', [
            'service'=>$service,
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $validate = Validator::make($request->all(), $rules);
    
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
    
        $category = Service::findOrFail($id);
    
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'slug' => Str::of($request->input('name'))->slug(),
        ];
    
        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::delete('public/images/services/' . $category->image);
            }
    
            $file = $request->file('image');
            $path = $file->store('public/images/services');
            $data['image'] = basename($path);
        }
    
        // Update the category and check if the save was successful
        $updated = $category->update($data);
    
        if ($updated) {
            return redirect()->route('getServices')->with('success', 'service updated successfully.');
        }
    
        return redirect()->route('getServices')->with('error', 'Failed to update the service. Please try again.');
    }
    
    
    
    public function destroy($id)
    {
        $post = Service::findOrFail($id);
    
        if ($post->image) {
            $imagePath = public_path('storage/images/services/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        $post->delete();
    
        return redirect('getServices')->with('success', 'Data has been deleted');
    }
}
