@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Events <span
                    class="text-muted fw-light">/ Create Event</span></h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        Create Event
                    </div>
                    <div class="col-6">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('publisher.events.index') }}" class="btn btn-dark active">
                                Back
                            </a>
                        </div>
                    </div>
                </h5>

                <div class="table-responsive text-nowrap">
                    <div class="container">

                        <!-- Check if there are any validation errors, if so, display them -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <!-- Loop through each validation error and display it -->
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Check if there is a success message, if so, display it -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form id="publisher-events-store" class="mb-3" action="{{ route('publisher.events.store') }}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div id="alert-container"></div>
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-8">
                                    <label for="description" class="form-label">Description</label>
                                    <input name="description" type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="city" class="form-label">City</label>
                                    <input name="city" type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="country" class="form-label">Country</label>
                                    <input name="country" type="text" class="form-control" value="">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="start_datetime" class="col-form-label">Start
                                        Datetime</label>
                                    <input class="form-control" name="start_datetime" type="datetime-local"
                                        value="2021-06-18T12:30:00" id="start_datetime">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="end_datetime" class="col-form-label">End
                                        Datetime</label>
                                    <input name="end_datetime" class="form-control" type="datetime-local"
                                        value="2021-06-18T12:30:00" id="end_datetime">
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="status" class="col-form-label"> Status </label>
                                    <select id="status" class="form-control @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="pending">Pending
                                        </option>
                                        <option value="inactive">Inactive
                                        </option>
                                        <option value="published">Published
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="m-2 mb-4 col-12 text-end">
                                <button type="submit" class="btn rounded-pill btn-success"
                                    id="update-appointment">Save</button>
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
