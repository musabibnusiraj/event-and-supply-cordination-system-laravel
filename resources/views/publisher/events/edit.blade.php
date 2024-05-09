@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Events <span
                    class="text-muted fw-light">/ Edit Event</span></h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        Edit Event
                    </div>
                    <div class="col-6">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ url()->previous() }}" class="btn btn-dark active">
                                Back
                            </a>
                        </div>
                    </div>
                </h5>

                <div class="table-responsive text-nowrap">
                    <div class="container">
                        <form id="appointment-form">
                            <div class="row">
                                <div class="col-12">
                                    <div id="alert-container"></div>
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="create_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-8">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="html5-datetime-local-input" class="col-form-label">Start
                                        Datetime</label>
                                    <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00"
                                        id="html5-datetime-local-input">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="html5-datetime-local-input" class="col-form-label">End
                                        Datetime</label>
                                    <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00"
                                        id="html5-datetime-local-input">
                                </div>

                                <div class="m-2 mb-4 col-12 text-end">
                                    <button type="button" class="btn rounded-pill btn-success"
                                        id="update-appointment">Update</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->

        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->
@endsection
