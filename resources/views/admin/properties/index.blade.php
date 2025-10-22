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
                        <h6 class="mb-0"><strong>{{ $properties->count() }}</strong> - Recent Properties</h6>
                        <div class="col-dm3">
                            <button type="button" class="btn btn-primary float-left" data-bs-toggle="modal" data-bs-target="#NewProperty">
                                Add New Property
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
                                @foreach($properties as $rs)
                                <tr>
                                    {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                                    <td><a href="{{ route('editProperty',['id'=>$rs->id]) }}">{{ $rs->title }}</a> 
                                     
                                    </td>
                                    <td>{{ $rs->listing_type }}
                                        <br> <spam>{{$rs->views}} Views 
                                        <br> <spam style="color: teal; font-size: 12px;">{{$rs->images->count()}} Images 
                                    </td>
                                    <td><img src="{{ asset('storage/images/properties/' .$rs->image) }}" alt="" width="120px"></td>
                                    <td>{{ $rs->price }}/{{ $rs->currency }}</td>
                                    <td>{{ $rs->contact }}</td>
                                    <td>{!! Str::words($rs->description, 30, '...') !!}</td>                                    
                                    <td>{{ $rs->status }}</td>
                                    <td>
                                        <div class="bg-light rounded ">
                                            <div class="btn-group" role="group">
                                                {{-- <button type="button" class="btn btn-danger"><i class="fa fa-eye"></i></button> --}}
                                                <a href="{{ route('editProperty',['id'=>$rs->id]) }}" class="btn btn-info"><i class="fa fa-images"></i></a>
                                                
                                                @if(Auth::user()->email == 'admin@iremetech.com' )
                                                <a href="{{ route('deleteProperty',['id'=>$rs->id]) }}" class="btn btn-warning"  onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i></a>
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
                <h4 class="modal-title">Adding New Property</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                <form class="form" action="{{ route('storeProperty') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <!-- Basic Details -->
                        <div class="row mb-3">
                            <div class="col-lg-9 col-sm-12">
                                <label for="title" class="form-label">Property Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Eg: Elegant Apartment" required>
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Eg: 50000000" required>
                            </div>
                        </div>

                        <!-- Filters -->
                        <div class="row mb-3">
                            <div class="col-lg-3 col-sm-12">
                                <label for="listing_type" class="form-label">Listing Type</label>
                                <select name="listing_type" class="form-control" required>
                                    <option value="" disabled selected>-- Select Listing Type --</option>
                                    <option value="Sell">Sell</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Buy">Buy</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="category" class="form-label">Property Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="" disabled selected>-- Select Category --</option>
                                    <option value="Residential">Residential</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Land">Land</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="currency" class="form-label">Currency</label>
                                <select name="currency" class="form-control" required>
                                    <option value="" selected disabled>-- Select Currency --</option>
                                    <option value="$">USD</option>
                                    <option value="UGX">UGX</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="furnished_status" class="form-label">Furnished Status</label>
                                <select name="furnished_status" class="form-control">
                                    <option value="" disabled selected>-- Select Status --</option>
                                    <option value="Unfurnished">Unfurnished</option>
                                    <option value="Semi-Furnished">Semi-Furnished</option>
                                    <option value="Furnished">Furnished</option>
                                </select>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="row mb-3">
                            <div class="col-lg-3 col-sm-12">
                                <label for="city" class="form-label">Main City</label>
                                <select id="city" name="city" class="form-control" required onchange="toggleOtherCity(this)">
                                    <option value="" disabled selected>-- Select City --</option>
                                    <option value="Arua">Arua</option>
                                    <option value="Entebbe">Entebbe</option>
                                    <option value="Fort Portal">Fort Portal</option>
                                    <option value="Gulu">Gulu</option>
                                    <option value="Hoima">Hoima</option>
                                    <option value="Jinja">Jinja</option>
                                    <option value="Kabale">Kabale</option>
                                    <option value="Kampala">Kampala</option>
                                    <option value="Masaka">Masaka</option>
                                    <option value="Mbale">Mbale</option>
                                    <option value="Mbarara">Mbarara</option>
                                    <option value="Mukono">Mukono</option>
                                    <option value="Mubende">Mubende</option>
                                    <option value="Wakiso">Wakiso</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="text" id="other_city" name="other_city" class="form-control mt-2" placeholder="Enter other city" style="display:none;">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="location" class="form-label">Exact Location</label>
                                <input type="text" name="location" class="form-control" placeholder="Eg: Ntinda, Kampala">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="bedrooms" class="form-label">Bedrooms</label>
                                <input type="number" name="bedrooms" class="form-control">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="bathrooms" class="form-label">Bathrooms</label>
                                <input type="number" name="bathrooms" class="form-control">
                            </div>
                        </div>

                        <!-- Other Info -->
                        <div class="row mb-3">
                            <div class="col-lg-3 col-sm-12">
                                <label for="parking" class="form-label">Parking Spaces</label>
                                <input type="number" name="parking" class="form-control" placeholder="Eg: 2">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="image" class="form-label">Cover Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="contact" class="form-label">Contact Telephone</label>
                                <input type="text" name="contact" class="form-control" placeholder="Direct Contact">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="email" class="form-label">Contact Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="propertyDescription" class="form-control" rows="5" placeholder="Describe this property..."></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary text-black">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </form>

<script>
function toggleOtherCity(select) {
    const otherCityInput = document.getElementById('other_city');
    otherCityInput.style.display = select.value === 'Other' ? 'block' : 'none';
}
</script>

                    
                    
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
        
            </div>
            </div>
        </div>
        @include('admin.includes.footer')

        <script>
            function toggleOtherCity(select) {
                const otherCityInput = document.getElementById('other_city');
                if (select.value === 'Other') {
                    otherCityInput.style.display = 'block';
                    otherCityInput.required = true;
                } else {
                    otherCityInput.style.display = 'none';
                    otherCityInput.required = false;
                }
            }
            </script>
 @endsection