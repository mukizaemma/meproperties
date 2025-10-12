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
                        <h6 class="mb-0"><strong>{{ $properties->count() }}</strong> - Recent Featured Products  </h6>
                        <div class="col-dm3">
                            <button type="button" class="btn btn-primary float-left" data-bs-toggle="modal" data-bs-target="#NewProperty">
                                Add New Product
                              </button>
                        </div>
                        <a href="{{ route('getCategories') }}">Products Categories</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Listing Type</th>
                                    <th scope="col">Subscription</th>
                                    <th scope="col">Cover Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Phone/Person</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $rs)
                                <tr>
                                    {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                                    <td><a href="{{ route('editDeal',['id'=>$rs->id]) }}">{{ $rs->title }}</a> 
                                    <br> <spam>{{$rs->images->count()}} Images  
                                    </td>
                                    <td>{{ $rs->listing_type }}
                                        <br> <spam>{{$rs->views}} Views 
                                    </td>
                                    <td>{{ $rs->subscription_type }}</td>
                                    <td><img src="{{ asset('storage/images/products/' .$rs->image) }}" alt="" width="120px"></td>
                                    <td>{{ $rs->price }}</td>
                                    <td>{{ $rs->contact }}</td>
                                    <td>{!! Str::words($rs->description, 30, '...') !!}</td>                                    
                                    <td>{{ $rs->status }}</td>
                                    <td>
                                        <div class="bg-light rounded ">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('editDeal',['id'=>$rs->id]) }}" class="btn btn-info"><i class="fa fa-images"></i></a>

                                                @if(Auth::user()->email == 'admin@iremetech.com' )
                                                <a href="{{ route('deleteDeal',['id'=>$rs->id]) }}" class="btn btn-warning"  onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i></a>
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
        <div class="modal fade" id="NewProperty">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Adding New Product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form" action="{{ route('storeDeal') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                    
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="title" class="form-label">Product Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Eg: Elegant Apartment" required>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-3 col-sm-12">
                                    <label for="category_id" class="form-label">Product Type</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="" disabled selected>-- Select Type--</option>
                                        @foreach ($services as $category )
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <label for="listing_type" class="form-label">Listing Type</label>
                                    <select name="listing_type" class="form-control" required>
                                        <option value="" disabled selected>-- Advert Type--</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Advert">Advert</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <label for="currency" class="form-label">Currency</label>
                                    <select name="currency" class="form-control" required>
                                        <option value="" selected disabled>-- Select Currency --</option>
                                        <option value="$">Dollars</option>
                                        <option value="Rwf">Rwf</option>
                                    </select>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="Eg: 50,000,000" required>
                                </div>

                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label for="condition" class="form-label">Product Condition</label>
                                    <select name="condition" class="form-control">
                                        <option value="" disabled selected>-- Select Status--</option>
                                        <option value="New">New</option>
                                        <option value="Second Hand">Second Hand</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="subscription_type" class="form-label">Subscription Type</label>
                                    <select name="subscription_type" class="form-control">
                                        <option value="" disabled selected>-- Select Subscription--</option>
                                        <option value="Free">Free</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Premium">Premium</option>
                                        <option value="Gold">Gold</option>
                                    </select>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="subscription_id" class="form-label">Owner</label>
                                    <select name="subscription_id" class="form-control">
                                        <option value="" selected disabled>--Select Owner--</option>
                                        @foreach ($subscriptions as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->names }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                    
                                <div class="col-lg-4 col-sm-12">
                                    <label for="image" class="form-label">Cover Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" class="form-control" placeholder="Eg: Kigali - Kicukiro">
                                </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <label for="contact" class="form-label">Contact Telephone</label>
                                        <input type="text" name="contact" class="form-control" placeholder="Eg: 078....">
                                    </div>

                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="productDescription" name="description" class="form-control" rows="5"></textarea>
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