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


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Site Visitors</p>
                                <h6 class="mb-0"><a href="https://analytics.google.com/analytics/web/#/p468682803/reports/intelligenthome" class="btn btn-dark" target="_blank">Google Analytics</a></h6>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-building fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Properties</p>
                                <h6 class="mb-0"><a >{{ $properties->count() }}</a></h6>
                                <span> {{ $totalPropertyPrice }} Rwf</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-car fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Cars</p>
                                <h6 class="mb-0">{{ $cars->count() }}</h6>
                                <span> {{ $totalCarPrice }} Rwf</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-shopping-bag fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Products</p>
                                <h6 class="mb-0"><a href="">{{ $deals->count() }}</a></h6>
                                <span> {{ $totalDealPrice }} Rwf</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Sales Chart Start -->
     


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"><strong>{{ $subscriptions->count() }}</strong> - Recent Subscriptions</h6>
                        <span> Total Amount Paid: <strong> {{ $totalSum }} Rwf</strong></span>
                        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search here" class="form-control" style="width: 200px;">
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

            <script>
                function searchTable() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("searchInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementsByClassName("table")[0];
                    tr = table.getElementsByTagName("tr");
            
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2]; // Change index to match the column you want to search
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>
            
            <!-- Recent Sales End -->



            <!-- Footer Start -->
            @include('admin.includes.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->



 @endsection