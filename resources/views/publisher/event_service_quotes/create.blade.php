@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Events </span><span
                    class="text-muted fw-light"> / Event Services </span> / Event Service Quotes</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        Create Event Service Quote
                    </div>
                    <div class="col-6">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('publisher.event.services.index', $event_id) }}" class="btn btn-dark active">
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

                        <form id="publisher-events-store" class="mb-3"
                            action="{{ route('publisher.event.services.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <input type="hidden" name="event_id" value="{{ $event_id }}" required>

                                <div class="col-12 mb-3">
                                    <label for="service_id" class="form-label">Status</label>
                                    <select id="service_id" class="form-control @error('service_id') is-invalid @enderror"
                                        name="service_id">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">
                                                <span class="text-capitalize"><b>{{ $service->name }} </b> -
                                                    {{ $service->description }}</span>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="note" class="form-label">Note</label>
                                    <input type="text" name="note" class="form-control" value="" required>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="budget_range_start" class="form-label">Budget From</label>
                                    <input name="budget_range_start" type="number" class="form-control" value="0"
                                        required>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="budget_range_end" class="form-label">Budget To</label>
                                    <input name="budget_range_end" type="text" class="form-control" value="1"
                                        required>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input name="quantity" type="text" class="form-control" value="1" required>
                                </div>

                                {{-- <div class="mb-3 col-6">
                                    <label for="document" class="form-label">Document</label>
                                    <input name="document" type="file" class="form-control" value="">
                                </div> --}}

                                <div class="m-2 mb-4 col-12 text-end">
                                    <button type="submit" class="btn rounded-pill btn-success"
                                        id="save-event-service">Save</button>
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
