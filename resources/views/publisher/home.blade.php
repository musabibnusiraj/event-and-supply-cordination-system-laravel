@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Welcome {{ Auth::user()->name ?? '' }}! 🎉</h5>
                                    <h6>Event {{ Auth::user()->roles->first()->name ?? '' }}</h6>
                                    <p class="mb-4"></p>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="{{ asset('../assets/img/illustrations/man-with-laptop-light.png') }}"
                                        height="140" alt="View Badge User"
                                        data-app-dark-img="{{ asset('illustrations/man-with-laptop-dark.png') }}"
                                        data-app-light-img="{{ asset('illustrations/man-with-laptop-light.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Content -->


        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
