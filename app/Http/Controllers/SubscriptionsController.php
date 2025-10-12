<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SubscriptionsController extends Controller
{
    public function index()
    {
    
        $subscriptions = Subscription::latest()->get();
        $setting = Setting::first();
        $users = User::where('role','!=','Super-admin')->latest()->get();
        return view('admin.subscriptions.index', [
            'subscriptions' => $subscriptions,
            'setting' => $setting,
            'users' => $users,
        ]);
    }
    
public function store(Request $request): RedirectResponse
{
    $slug = Str::of($request->input('names'))->slug();

    $subscription = new Subscription();
    $subscription->names = $request->input('names');
    $subscription->phone = $request->input('phone');
    $subscription->email = $request->input('email');
    $subscription->address = $request->input('address');
    $subscription->website = $request->input('website');
    $subscription->url = $request->input('url');
    $subscription->description = $request->input('description');
    $subscription->subscription_type = $request->input('subscription_type');
    $subscription->amount_paid = $request->input('amount_paid', 0);
    $subscription->amount_due = $request->input('amount_due', 0);
    $subscription->is_paid = $request->boolean('is_paid');
    $subscription->is_recurring = $request->boolean('is_recurring');
    $subscription->grants_account = $request->boolean('grants_account');
    $subscription->start_date = $request->input('start_date');
    $subscription->end_date = $request->input('end_date');
    $subscription->next_due_date = $request->input('next_due_date');
    $subscription->slug = $slug;
    $subscription->added_by = $request->user()->id;

    $saved = $subscription->save();

    if ($saved && $subscription->grants_account) {
        // Create a user account if email is provided and not already used
        if ($subscription->email && !User::where('email', $subscription->email)->exists()) {
            $user = new User();
            $user->user_id = Str::uuid();
            $user->name = $subscription->names;
            $user->email = $subscription->email;
            $user->password = Hash::make('password'); // you can change this
            $user->save();
        }
    }

    if ($saved) {
        return redirect()->route('getSubscriptions')->with('success', 'New Subscription has been saved successfully.');
    } else {
        return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
    }
}
    
    public function edit($id)
    {
        $subscription = Subscription::find($id);
        return view('admin.subscriptions.update', [
            'subscription'=>$subscription,
        ]);
    }
    public function view($id)
    {
        $subscription = Subscription::find($id);
        $program= Subscription::all();
        return view('admin.posts.blogView', [
            'service'=>$subscription,
            'program'=>$program,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $subscription = Subscription::findOrFail($id);
    
    
            $fields = ['names', 'email', 'phone','address','website','url','description','subscription_type','status','added_by',
            'amount_paid','amount_due','is_paid','is_recurring','start_date','end_date','next_due_date','grants_account'];
            foreach ($fields as $field) {
                if ($request->has($field) && $request->input($field) !== $subscription->$field) {
                    $subscription->$field = $request->input($field);
                }
            }
    
            if ($subscription->isDirty('title')) {
                $slug = Str::of($subscription->title)->slug();
                if (Subscription::where('slug', $slug)->where('id', '!=', $subscription->id)->exists()) {
                    $slug .= '-' . uniqid();
                }
                $subscription->slug = $slug;
            }
    
            $subscription->save();
    
            return redirect()->route('getSubscriptions')->with('success', 'Service has been updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function destroy($id)
    {
        $subscription = Subscription::find($id); 
        if (!$subscription) {
            return back()->with('error', 'Content not found');
        }
        $subscription->delete($id);
        return back()
            ->with('success', 'Story deleted successfully');
    }
}
