@extends('layouts.guest-app')
@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">



                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Images -->
                        <div class="row mb-5 mx-auto">

                            <div class="col-md-6 col-xl-4 mx-auto">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Login As Supplier & Cordinator</h5>
                                        <p class="card-text">
                                            Login as a Supplier & Coordinator to access specialized features and resources
                                            tailored to your role, including
                                            event organizers, organizing events, finding/connecting with suppliers.
                                        </p>
                                    </div>
                                    <div class="text-end">
                                        @if (Route::has('login'))
                                            <a class="btn btn-primary mx-2 mb-2" type="button"
                                                href="{{ route('login', ['type' => 'S']) }}"><b>Login</b> As Supplier</a>
                                        @endif
                                    </div>
                                    <img class="card-img-bottom" src="{{ asset('../assets/img/elements/1.jpg') }}"
                                        alt="Card image cap" />

                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4 mx-auto">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Login As Event Publisher</h5>
                                        <p class="card-text">
                                            Welcome to the Event Publisher portal, where you can easily create, manage, and
                                            promote your events with powerful tools and intuitive features designed to
                                            streamline your event management process.
                                        </p>
                                    </div>
                                    <div class="text-end">
                                        @if (Route::has('login'))
                                            <a class="btn btn-primary mx-2 mb-2" type="button"
                                                href="{{ route('login') }}"><b>Login</b>
                                                As Publisher</a>
                                        @endif
                                    </div>
                                    <img class="card-img-bottom" src="{{ asset('../assets/img/elements/11.jpg') }}"
                                        alt="Card image cap" />

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
