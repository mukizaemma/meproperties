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
                <ul class="nav mt-10">
                    <li class="nav-item mr-20 ">
                        <a href="{{ route('getDeals') }}" class="btn btn-dark">Back</a>
                    </li>
                    <li class="nav-item ">
                        
                    <li class="breadcrumb-item active"> Updating  <strong>  {{$product->title}}</strong></li>

                    </li>
                    <li class="nav-item ms-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newImage">
                            Add New Image
                        </button>
                    </li>
                </ul>
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
                            <form class="form" action="{{ route('updateDeal',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">
                    
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="title" class="form-label">Product Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-3 col-sm-12">
                                            <label for="category_id" class="form-label">Product Type</label>
                                            <select name="category_id" class="form-control" >
                                                <option value="" disabled selected>{{ $product->category->name }}</option>
                                                @foreach ($services as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
        
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label for="listing_type" class="form-label">Listing Type</label>
                                            <select name="listing_type" class="form-control" >
                                                <option value="" disabled selected>{{ $product->listing_type }}</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Advert">Advert</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label for="currency" class="form-label">Currency</label>
                                            <select name="currency" class="form-control" >
                                                <option value="" selected disabled>{{ $product->currency }}</option>
                                                <option value="$">Dollars</option>
                                                <option value="Rwf">Rwf</option>
                                            </select>
                                        </div>
        
                                        <div class="col-lg-3 col-sm-12">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" name="price" class="form-control"  value="{{ $product->price }}">
                                        </div>
        
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="condition" class="form-label">Product Condition</label>
                                            <select name="condition" class="form-control">
                                                <option value="" disabled selected>{{ $product->condition }}</option>
                                                <option value="New">New</option>
                                                <option value="Second Hand">Second Hand</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="subscription_type" class="form-label">Subscription Type</label>
                                            <select name="subscription_type" class="form-control">
                                                <option value="" disabled selected>{{ $product->subscription_type }}</option>
                                                <option value="Free">Free</option>
                                                <option value="Basic">Basic</option>
                                                <option value="Premium">Premium</option>
                                                <option value="Gold">Gold</option>
                                            </select>
                                        </div>
        
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="subscription_id" class="form-label">Owner</label>
                                            <select name="subscription_id" class="form-control">
                                                <option value="" selected disabled>{{ $product->subscription->names }} ({{ $product->subscription->subscription_type }}) </option>
                                                @foreach ($subscriptions as $sub)
                                                    <option value="{{ $sub->id }}">{{ $sub->names }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                            
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="image" class="form-label">Cover Image</label>
                                            <input type="file" name="image" class="form-control" >
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" name="location" class="form-control"  value="{{ $product->location }}">
                                        </div>
        
                                            <div class="col-lg-4 col-sm-12">
                                                <label for="contact" class="form-label">Contact Telephone</label>
                                                <input type="text" name="contact" class="form-control"  value="{{ $product->contact }}">
                                            </div>
        
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea id="productDescription" name="description" class="form-control" rows="5">{!! $product->description !!}</textarea>
                                        </div>
                                    </div>
                            
                                </div>

                                <div class="form-actions mt-5">
                                    <button type="submit" class="btn btn-primary text-black">
                                        <i class="fa fa-save"></i> Save Changes
                                    </button>

                                    <a href="{{ route('getCars') }}" class="btn btn-light">Go Back</a>


                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Image Gallery Section -->
                    <div class="card mt-5">
                        <div class="card-header bg-dark text-white d-flex align-items-center">
                            <h5 class="mb-0">
                                <span style="color: yellow">{{ $totalImages }}</span> Images
                            </h5>
                            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newImage">
                                Add New Image
                            </button>
                        </div>
                        
                        <div class="card-body">
                            @if($images->count() == 0)
                                <p class="text-muted">No images yet.</p>
                            @else
                                <div class="row">
                                    @foreach($images as $image)
                                    <div class="col-md-4 col-sm-6 mb-4">
                                        <div class="card shadow" style="position: relative; overflow: hidden; transition: 0.3s;">
                                            <img src="{{ asset('storage/images/products/' . $image->image) }}" 
                                                class="card-img-top rounded" alt="Blog Image" style="width: 100%; height: auto;">
                                            <button onclick="confirmDelete('{{ route('deleteDealImage', $image->id) }}')" 
                                                    style="position: absolute; top: 10px; right: 10px; background: rgba(255, 0, 0, 0.8); color: white; border: none; padding: 6px 10px; border-radius: 50%; cursor: pointer; transition: 0.3s;">
                                                ×
                                            </button>
                                            <div class="card-body text-center">
                                                <h6 class="card-title text-truncate" style="max-width: 100%;">{{ $image->title }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- Content End -->

        @include('admin.includes.footer')
 @endsection

          <!-- Add Image Modal -->
          <div class="modal fade" id="newImage">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
    
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Adding New Image to {{ $product->title ?? '' }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
    
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form" action="{{ route('addDealImage',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="image" class="form-label">Upload Images</label>
                                    <div class="input-group">
                                        <input type="hidden" name="deal_id" value="{{ $product->id }}">
                                        <input type="file" name="image[]" class="form-control" id="image" multiple>
                                    </div>
                                    <small class="text-muted">You can upload one or multiple images.</small>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary text-black">
                                <i class="fa fa-save"></i> Upload
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
    
        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this image? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="" id="deleteConfirmBtn" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    
        <script>
            function confirmDelete(deleteUrl) {
                document.getElementById('deleteConfirmBtn').setAttribute('href', deleteUrl);
                var confirmModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                confirmModal.show();
            }
        </script>