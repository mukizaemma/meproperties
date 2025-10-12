@extends('layouts.adminBase')


@section('content')


        <!-- Sidebar Start -->
@include('admin.includes.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.includes.navbar')
            <!-- Navbar End -->

            <div class="container-fluid px-4">
                {{-- <h1 class="mt-4">Dashboard</h1> --}}
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Updating <strong> {{$subscription->title}}</strong></li>
                </ol>
                <div class="row">
                    @if (session()->has('success'))
                        <div class="arlert alert-success">
                            <button class="close" type="button" data-dismiss="alert">X</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="arlert alert-danger">
                            <button class="close" type="button" data-dismiss="alert">X</button>
                            {{ session()->get('error') }}
                        </div>
                    @endif
                </div>

                <div class="container-fluid px-4">

                    <div class="card mb-4">

                        <div class="card-body">
                            <form class="form" action="{{ route('updateSubscription',$subscription->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="names" class="form-label">Names</label>
                                            <input type="text" name="names" class="form-control" id="names" value="{{ $subscription->names }}">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $subscription->phone }}">
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{ $subscription->email }}">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="address" value="{{ $subscription->address }}">
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="url" name="website" class="form-control" id="website" value="{{ $subscription->website }}">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="url" class="form-label">Service URL</label>
                                            <input type="url" name="url" class="form-control" id="url" value="{{ $subscription->url }}">
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea id="description" rows="5" class="form-control" name="description">{!! $subscription->description !!}</textarea>
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="subscription_type" class="form-label">Subscription Type</label>
                                            <select name="subscription_type" id="subscription_type" class="form-control">
                                                <option value="" disabled selected >{{ $subscription->subscription_type }}</option>
                                                <option value="Free">Free</option>
                                                <option value="Basic">Basic</option>
                                                <option value="Premium">Premium</option>
                                                <option value="Gold">Gold</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="amount_paid" class="form-label">Amount Paid</label>
                                            <input type="number" step="0.01" name="amount_paid" class="form-control" id="amount_paid" value="0" value="{{ $subscription->amount_paid }}">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="amount_due" class="form-label">Amount Due</label>
                                            <input type="number" step="0.01" name="amount_due" class="form-control" id="amount_due" value="0" value="{{ $subscription->amount_due }}">
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-check-label" for="is_paid">
                                                <input type="checkbox" name="is_paid" id="is_paid" class="form-check-input" > Is Paid?
                                            </label>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-check-label" for="is_recurring">
                                                <input type="checkbox" name="is_recurring" id="is_recurring" class="form-check-input"> Recurring?
                                            </label>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-check-label" for="grants_account">
                                                <input type="checkbox" name="grants_account" id="grants_account" class="form-check-input"> Grants Account?
                                            </label>
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="start_date" class="form-label">Start Date</label>
                                            <input type="datetime-local" name="start_date" class="form-control" id="start_date" value="{{ $subscription->start_date }}">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="end_date" class="form-label">End Date</label>
                                            <input type="datetime-local" name="end_date" class="form-control" id="end_date" value="{{ $subscription->end_date }}">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="next_due_date" class="form-label">Next Due Date</label>
                                            <input type="datetime-local" name="next_due_date" class="form-control" id="next_due_date" value="{{ $subscription->next_due_date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions mt-5">
                                    <button type="submit" class="btn btn-primary text-black">
                                        <i class="fa fa-save"></i> Save Changes
                                    </button>

                                    <a href="{{ route('getSubscriptions') }}" class="btn btn-light">Go Back</a>


                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>

        </div>
        <!-- Content End -->

        @include('admin.includes.footer')
 @endsection