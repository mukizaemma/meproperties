<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    public function index()
    {

        $slides = Slide::latest()->get();
        $setting = Setting::first();
        return view('admin.includes.slides', ['slides'=>$slides,'setting'=>$setting]);
    }


    public function store(Request $request)
    {
        $data = new Slide();
        $data ->heading = $request->heading;
        $data ->subheading = $request->subheading;

        // Uploading image
        if ($request->hasFile('image')) {
            $dir = 'public/images/slides';
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);
            $data->image = $fileName;
        }

        $stored = $data->save();

        if($stored){
            return redirect('slides')->with('success', 'New Image has been added successfuly');
        }

        return redirect()->back()->with('error','Failed to add new Image');
    }

    public function edit($id)
    {
        $data = Slide::find($id);
        return view('admin.includes.slideUpdate', ['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data = Slide::find($id);
        $data->heading = $request->input('heading');
        $data->subheading = $request->input('subheading');

        if(!$data){
            return back()->with('Error','Image Not Found');
        }

        if ($request->hasFile('image') && request('image') != '') {
            $dir = 'public/images/slides';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->image = $fileName;
        }

        $data->update();

        return redirect('slides')->with('success','Image has been updated');
    }

    public function destroy($id)
    {
        $image = Slide::findOrFail($id);
        // delete the image file
        Storage::delete('public/images/gallery/'.$image);
        $image->delete();
        return redirect()->back()->with('warning', 'Item has been deleted');
    }


    public function getImages()
    {

        $images = Gallery::latest()->get();
        return view('admin.gallery', ['images'=>$images]);
    }
    
    public function saveImage(Request $request)
    {
        $data = new Gallery();
        $data ->caption = $request->caption;

        // Uploading image
        if ($request->hasFile('image')) {
            $dir = 'public/images/gallery';
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);
            $data->image = $fileName;
        }

        $stored = $data->save();

        if($stored){
            return redirect('getImages')->with('success', 'New Image has been added successfuly');
        }

        return redirect()->back()->with('error','Failed to add new Image');
    }

    
    public function editGallery($id)
    {
        $data = Gallery::findOrFail($id);
        return view('admin.galleryUpdate', ['data'=>$data]);
    }

    public function updateGallery(Request $request, $id){
        $data = Gallery::find($id);
        $data->caption = $request->input('caption');

        if(!$data){
            return back()->with('Error','Image Not Found');
        }

        if ($request->hasFile('image') && request('image') != '') {
            $dir = 'public/images/gallery';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->image = $fileName;
        }

        $data->update();

        return redirect('getImages')->with('success','Image has been updated');
    }
    
    public function destroyImage($id)
    {
        $image = Gallery::findOrFail($id);
        // delete the image file
        Storage::delete('public/images/gallery/'.$image);
        $image->delete();
        return redirect()->back()->with('warning', 'Item has been deleted');
    }

}
