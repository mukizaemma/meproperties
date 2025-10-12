@extends('layouts.adminBase')


@section('content')


        <!-- Sidebar Start -->
@include('admin.includes.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

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
            <!-- Navbar Start -->
            @include('admin.includes.navbar')
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"><strong>{{ $subscriptions->count() }}</strong> - Recent Subscriptions</h6>
                        <div class="col-dm3">
                            <button type="button" class="btn btn-primary float-left" data-bs-toggle="modal" data-bs-target="#NewProduct">
                                Add Subscription
                              </button>
                        </div>
                        {{-- <a href="">Show All</a> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Names</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Subscription Type</th>
                                    <th scope="col">Amount Due</th>
                                    <th scope="col">Amount Paid</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscriptions as $rs)
                                <tr>

                                    <td><a href="{{ route('editSubscription',['id'=>$rs->id]) }}">{{ $rs->names }}</a></td>
                                    <td>{{ $rs->phone }}</td>
                                    <td>{{ $rs->subscription_type }}</td>
                                    <td>{{ $rs->amount_due }}</td>
                                    <td>{{ $rs->amount_paid }}</td>
                                    <td>{{ $rs->start_date }}</td>
                                    <td>{!! Str::words($rs->description, 50, '...') !!}</td>
                                    <td>{{ $rs->status }}</td>
                                    <td>
                                        <div class="bg-light rounded ">
                                            <div class="btn-group" role="group">
                                                {{-- <button type="button" class="btn btn-danger"><i class="fa fa-eye"></i></button> --}}
                                                <a href="{{ route('editSubscription',['id'=>$rs->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                @if(Auth::user()->email == 'admin@iremetech.com' )
                                                <a href="{{ route('deleteSubscription',['id'=>$rs->id]) }}" class="btn btn-warning"  onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i></a>
                                                @else 
                                                <a  class="btn btn-warning"  onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- Content End -->


        <!-- The Modal -->
        <div class="modal fade" id="NewProduct">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Adding New Service</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form" action="{{ route('storeSubscription') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="names" class="form-label">Names</label>
                                    <input type="text" name="names" class="form-control" id="names" placeholder="Full Name" required>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="url" name="website" class="form-control" id="website" placeholder="https://example.com">
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="url" class="form-label">Service URL</label>
                                    <input type="url" name="url" class="form-control" id="url" placeholder="https://service.example.com">
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" rows="5" class="form-control" name="description"></textarea>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label for="subscription_type" class="form-label">Subscription Type</label>
                                    <select name="subscription_type" id="subscription_type" class="form-control">
                                        <option value="Free">Free</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Premium">Premium</option>
                                        <option value="Gold">Gold</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="amount_paid" class="form-label">Amount Paid</label>
                                    <input type="number" step="0.01" name="amount_paid" class="form-control" id="amount_paid" value="0">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="amount_due" class="form-label">Amount Due</label>
                                    <input type="number" step="0.01" name="amount_due" class="form-control" id="amount_due" value="0">
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label class="form-check-label" for="is_paid">
                                        <input type="checkbox" name="is_paid" id="is_paid" class="form-check-input"> Is Paid?
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
                                    <input type="datetime-local" name="start_date" class="form-control" id="start_date">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="datetime-local" name="end_date" class="form-control" id="end_date">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="next_due_date" class="form-label">Next Due Date</label>
                                    <input type="datetime-local" name="next_due_date" class="form-control" id="next_due_date">
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary text-black">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </form>
                    
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
        
            </div>
            </div>
        </div>
        @include('admin.includes.footer')
 @endsection