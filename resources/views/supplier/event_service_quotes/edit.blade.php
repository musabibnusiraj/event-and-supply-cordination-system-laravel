@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Events </span><span
                    class="text-muted fw-light"> / Event Service Quotes</span> / Update Quote</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        Update Quote
                    </div>
                    <div class="col-6">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('supplier.event.service.quotes.index', $event_service->id) }}"
                                class="btn btn-dark active">
                                Back
                            </a>
                        </div>
                    </div>
                </h5>

                <div class="table-responsive text-nowrap">
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="mx-3">
                            <div class="d-flex justify-content-between w-100">
                                <h6>{{ $event_service->title }}</h6>
                                <small>{{ $event_service->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">
                                {{ $event_service->note }}
                            </p>
                            <small class="row">
                                <div class="col-6">
                                    <i>Service Type:</i> {{ $event_service->service->name }} </br>
                                    <i>Qty:</i> {{ $event_service->quantity }} </br>
                                    <i>Quotations:</i> {{ $event_service->quotations->count() }}
                                </div>
                                <div class="text-end col-6">
                                    <strong>
                                        Est. Budget: LKR {{ $event_service->budget_range_start }}
                                        @if ($event_service->budget_range_start !== $event_service->budget_range_end)
                                            - {{ $event_service->budget_range_end }}
                                        @endif
                                    </strong>
                                </div>
                            </small>
                        </div>
                    </div>

                    <div class="container mt-4">

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
                            action="{{ route('supplier.event.service.quotes.update', $event_service_quote->id) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="note" class="form-label">Proposal Note</label>
                                    <textarea type="text" name="note" class="form-control" required>{{ $event_service_quote->note ?? '' }}</textarea>
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="budget_range_start" class="form-label">Budget From</label>
                                    <input name="budget_range_start" type="number" class="form-control" min="1"
                                        value="{{ $event_service_quote->budget_range_start ?? '' }}" required>
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="budget_range_end" class="form-label">Budget To</label>
                                    <input name="budget_range_end" type="number" class="form-control" min="1"
                                        value="{{ $event_service_quote->budget_range_end ?? '' }}" required>
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input name="quantity" type="text" class="form-control"
                                        value="{{ $event_service_quote->quantity ?? 1 }}" required>
                                </div>

                                <div class="m-2 mb-4 col-12 text-end">
                                    <button type="submit" class="btn rounded-pill btn-success"
                                        id="save-event-service">Update</button>
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
