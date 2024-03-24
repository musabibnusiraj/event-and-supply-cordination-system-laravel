@extends('layouts.guest-app')
@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                                    aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->
                    </div>

                    <div class="layout-demo-info">
                        @if (Route::has('login'))
                            <a class="btn btn-primary mb-2" type="button" href="{{ route('login') }}">Login</a>
                        @endif
                    </div>
                </nav>

                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Images -->
                        <div class="row mb-5">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3">
                                    <img class="card-img-top" src="../assets/img/elements/18.jpg" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            This is a wider card with supporting text below as a natural lead-in to
                                            additional content. This
                                            content is a little bit longer.
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            This is a wider card with supporting text below as a natural lead-in to
                                            additional content. This
                                            content is a little bit longer.
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                    <img class="card-img-bottom" src="../assets/img/elements/1.jpg" alt="Card image cap" />
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card bg-dark border-0 text-white">
                                    <img class="card-img" src="../assets/img/elements/11.jpg" alt="Card image" />
                                    <div class="card-img-overlay">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            This is a wider card with supporting text below as a natural lead-in to
                                            additional content. This
                                            content is a little bit longer.
                                        </p>
                                        <p class="card-text">Last updated 3 mins ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Images -->

                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- / Layout wrapper -->
@endsection
