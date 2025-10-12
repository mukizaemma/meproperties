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
                        <h6 class="mb-0"> <strong>{{ $cars->count() }}</strong> - Recent Cars</h6>
                        <div class="col-dm3">
                            <button type="button" class="btn btn-primary float-left" data-bs-toggle="modal" data-bs-target="#NewProduct">
                                Add New Car
                              </button>
                        </div>
                        {{-- <a href="">Show All</a> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Advert Type</th>
                                    <th scope="col">Cover Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Phone/Person</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $rs)
                                <tr>
                                    {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                                    <td><a href="{{ route('editCar',['id'=>$rs->id]) }}">{{ $rs->title }}</a> 
                                    <br> <spam>{{$rs->images->count()}} Images  
                                    </td>
                                    <td>{{ $rs->advertType }}
                                        <br> <spam>{{$rs->views}} Views 
                                    </td>
                                    <td><img src="{{ asset('storage/images/cars/' .$rs->image) }}" alt="" width="120px"></td>
                                    <td>{{ $rs->price }}</td>
                                    <td>{{ $rs->contact }}</td>
                                    <td>{!! Str::words($rs->description, 30, '...') !!}</td>                                    
                                    <td>{{ $rs->status }}</td>
                                    <td>
                                        <div class="bg-light rounded ">
                                            <div class="btn-group" role="group">
                                                {{-- <button type="button" class="btn btn-danger"><i class="fa fa-eye"></i></button> --}}
                                                <a href="{{ route('editCar',['id'=>$rs->id]) }}" class="btn btn-info"><i class="fa fa-images"></i></a>
                                                <a href="{{ route('deleteCar',['id'=>$rs->id]) }}" class="btn btn-warning"  onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i></a>
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
                <h4 class="modal-title">Adding New Car</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form" action="{{ route('storeCar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                    
                            <div class="row mb-3">
                                <div class="col-lg-8 col-sm-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Eg: Elegant SUV" required>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="cartype_id" class="form-label">Car Type</label>
                                    <select name="cartype_id" class="form-control" required>
                                        <option value="" disabled selected>--Select Car Type--</option>
                                        @foreach ($carTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label for="advertType" class="form-label">Advert Type</label>
                                    <select name="advertType" class="form-control">
                                        <option value="" disabled selected>--Select Type--</option>
                                        <option value="For Rent">Rent</option>
                                        <option value="For Sell">Sell</option>
                                    </select>
                                </div>
                    
                                <div class="col-lg-4 col-sm-12">
                                    <label for="subscription_type" class="form-label">Subscription Type</label>
                                    <select name="subscription_type" class="form-control" required>
                                        <option value="Free">Free</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Premium">Premium</option>
                                        <option value="Gold">Gold</option>
                                    </select>
                                </div>
                    
                                <div class="col-lg-2 col-sm-12">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="Eg: 5000" required>
                                </div>
                                <div class="col-lg-2 col-sm-12">
                                    <label for="currency" class="form-label">Currency</label>
                                    <select name="currency" class="form-control" required>
                                        <option value="" selected disabled>-- Select Currency --</option>
                                        <option value="$">Dollars</option>
                                        <option value="Rwf">Rwf</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label for="model" class="form-label">Car Model</label>
                                    <input type="text" name="model" class="form-control" placeholder="Eg: Toyota">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="year" class="form-label">Year Made</label>
                                    <input type="number" name="year" class="form-control" placeholder="Eg: 2019">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="doors" class="form-label">Number of Doors</label>
                                    <input type="text" name="doors" class="form-control" placeholder="Eg: 4">
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label for="mileage" class="form-label">Mileage (Km)</label>
                                    <input type="number" name="mileage" class="form-control" placeholder="Eg: 25000">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="engineType" class="form-label">Engine Type</label>
                                    <select name="engineType" class="form-control">
                                        <option value="" disabled selected>--Select Engine--</option>
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Electric">Electric</option>
                                        <option value="Hybrid">Hybrid</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="transmission" class="form-label">Transmission</label>
                                    <select name="transmission" class="form-control">
                                        <option value="" disabled selected>--Select Transmission--</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Automatic">Automatic</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label for="subscription_id" class="form-label">Owner</label>
                                    <select name="subscription_id" class="form-control">
                                        <option value="" disabled selected>--Select Subscription--</option>
                                        @foreach ($subscriptions as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->names }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-lg-4 col-sm-12">
                                    <label for="ownerTel" class="form-label">Owner Telephone</label>
                                    <input type="text" name="ownerTel" class="form-control" placeholder="Eg: 078xxxxxxx">
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="email" class="form-label">Owner ID</label>
                                    <input type="number" name="ownerId" class="form-control" placeholder="Email">
                                </div>

                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="contact" class="form-label">Contact Person</label>
                                    <input type="text" name="contact" class="form-control" placeholder="Contact Phone Number">
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="image" class="form-label">Cover Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="CarDescription" name="description" class="form-control" rows="5"></textarea>
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