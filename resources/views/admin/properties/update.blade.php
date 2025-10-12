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
                        
                    <li class="breadcrumb-item active"> Updating  <strong>  {{$property->title}}</strong></li>

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
                        <form class="form" action="{{ route('updateProperty',$property->id) }}" method="POST" enctype="multipart/form-data"> 
                            @csrf

                            <div class="modal-body">

                                <!-- Title and Price -->
                                <div class="row mb-3">
                                    <div class="col-lg-9 col-sm-12">
                                        <label for="title" class="form-label">Property Title</label>
                                        <input type="text" name="title" class="form-control" 
                                            value="{{ old('title', $property->title) }}" 
                                            placeholder="Eg: Elegant Apartment" required>
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control" 
                                            value="{{ old('price', $property->price) }}" 
                                            placeholder="Eg: 50,000,000" required>
                                    </div>
                                </div>

                                <!-- Currency, City, Category, Listing Type -->
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-sm-12">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select name="currency" class="form-control" required>
                                            <option value="" disabled>-- Select Currency --</option>
                                            <option value="$" {{ $property->currency == '$' ? 'selected' : '' }}>Dollars</option>
                                            <option value="UGX" {{ $property->currency == 'UGX' ? 'selected' : '' }}>UGX</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <label for="city" class="form-label">Main Cities</label>
                                        <select id="city" name="city" class="form-control" onchange="toggleOtherCity(this)" required>
                                            <option value="" disabled>-- Select City --</option>
                                            @foreach(['Arua','Entebbe','Fort Portal','Gulu','Hoima','Jinja','Kabale','Kampala','Masaka','Mbale','Mbarara','Mukono','Mubende','Wakiso','Other'] as $city)
                                                <option value="{{ $city }}" {{ $property->city == $city ? 'selected' : '' }}>{{ $city }}</option>
                                            @endforeach
                                        </select>

                                        <input type="text" id="other_city" name="other_city" 
                                            class="form-control mt-2" 
                                            placeholder="Enter other city" 
                                            value="{{ old('other_city', $property->other_city) }}" 
                                            style="{{ $property->city == 'Other' ? '' : 'display:none;' }}">
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <label for="property_type" class="form-label">Category</label>
                                        <select name="property_type" class="form-control" required>
                                            <option value="" disabled>-- Select Category --</option>
                                            <option value="Residential" {{ $property->property_type == 'Residential' ? 'selected' : '' }}>Residential</option>
                                            <option value="Commercial" {{ $property->property_type == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                                            <option value="Featured Properties" {{ $property->property_type == 'Featured Properties' ? 'selected' : '' }}>Featured Properties</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <label for="listing_type" class="form-label">Listing Type</label>
                                        <select name="listing_type" class="form-control" required>
                                            <option value="" disabled>-- Advert Type --</option>
                                            <option value="Sell" {{ $property->listing_type == 'Sell' ? 'selected' : '' }}>Sell</option>
                                            <option value="Rent" {{ $property->listing_type == 'Rent' ? 'selected' : '' }}>Rent</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Location, Bedrooms, Bathrooms, Parking -->
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-sm-12">
                                        <label for="location" class="form-label">Exact Location</label>
                                        <input type="text" name="location" class="form-control" 
                                            placeholder="Eg: Kampala - Kololo" 
                                            value="{{ old('location', $property->location) }}">
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <label for="bedrooms" class="form-label">Bedrooms</label>
                                        <input type="number" name="bedrooms" class="form-control" 
                                            value="{{ old('bedrooms', $property->bedrooms) }}">
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <label for="bathrooms" class="form-label">Bathrooms</label>
                                        <input type="number" name="bathrooms" class="form-control" 
                                            value="{{ old('bathrooms', $property->bathrooms) }}">
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <label for="parking" class="form-label">Parking Size</label>
                                        <input type="number" name="parking" class="form-control" 
                                            value="{{ old('parking', $property->parking) }}">
                                    </div>
                                </div>

                                <!-- Furnished, Image, Contact, Email -->
                                <div class="row mb-4">
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="furnished_status" class="form-label">Furnished Status</label>
                                        <select name="furnished_status" class="form-control">
                                            <option value="" disabled>-- Select Status --</option>
                                            <option value="Unfurnished" {{ $property->furnished_status == 'Unfurnished' ? 'selected' : '' }}>Unfurnished</option>
                                            <option value="Semi-Furnished" {{ $property->furnished_status == 'Semi-Furnished' ? 'selected' : '' }}>Semi-Furnished</option>
                                            <option value="Furnished" {{ $property->furnished_status == 'Furnished' ? 'selected' : '' }}>Furnished</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <label for="image" class="form-label">Cover Image</label>

                                        @if($property->image)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/images/properties/' . $property->image) }}" 
                                                    alt="Cover Image" 
                                                    class="img-fluid rounded border shadow-sm" 
                                                    style="max-height: 150px; object-fit: cover;">
                                                <small class="text-muted d-block mt-1">Current image</small>
                                            </div>
                                        @endif

                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="New" {{ $property->status == 'New' ? 'selected' : '' }}>New</option>
                                            <option value="Featured" {{ $property->status == 'Featured' ? 'selected' : '' }}>Featured</option>
                                            <option value="Promo" {{ $property->status == 'Promo' ? 'selected' : '' }}>Promo</option>
                                            <option value="Available" {{ $property->status == 'Available' ? 'selected' : '' }}>Available</option>
                                            <option value="Sold" {{ $property->status == 'Sold' ? 'selected' : '' }}>Sold</option>
                                            <option value="Rented" {{ $property->status == 'Rented' ? 'selected' : '' }}>Rented</option>
                                            <option value="Unavailable" {{ $property->status == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                                            <option value="Pending" {{ $property->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="contact" class="form-label">Contact Telephone</label>
                                        <input type="text" name="contact" class="form-control" 
                                            value="{{ old('contact', $property->contact) }}" 
                                            placeholder="Direct Contact">
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <label for="email" class="form-label">Contact Email</label>
                                        <input type="email" name="email" class="form-control" 
                                            value="{{ old('email', $property->email) }}" 
                                            placeholder="Email">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" id="propertyDescription" class="form-control" rows="5">{{ old('description', $property->description) }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions mt-4">
                                <button type="submit" class="btn btn-primary text-black">
                                    <i class="fa fa-save"></i> Save Changes
                                </button>
                                <a href="{{ route('getProperties') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>



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
                                            <img src="{{ asset('storage/images/properties/' . $image->image) }}" 
                                                class="card-img-top rounded" alt="Blog Image" style="width: 100%; height: auto;">
                                            <button onclick="confirmDelete('{{ route('deletePropertyImage', $image->id) }}')" 
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
                <h4 class="modal-title">Adding New Image to {{ $property->title ?? '' }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
    
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form" action="{{ route('addPropertyImage',['id'=>$property->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="image" class="form-label">Upload Images</label>
                                    <div class="input-group">
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
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

            function toggleOtherCity(select) {
            const otherCityInput = document.getElementById('other_city');
            if (select.value === 'Other') {
                otherCityInput.style.display = 'block';
            } else {
                otherCityInput.style.display = 'none';
                otherCityInput.value = '';
            }
        }

        </script>

