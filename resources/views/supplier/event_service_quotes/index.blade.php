@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Events </span> / Event Service Quotes
            </h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        {{ $event_service->event->name ?? '' }}

                        @if ($event_service->status == 'completed')
                            <span class="badge bg-label-warning"> Completed </span>
                        @elseif ($awarded == 0)
                            <span class="badge bg-label-success"> Open </span>
                        @else
                            <span class="badge bg-success"> Awarded </span>
                        @endif

                        <small class="muted d-block mt-3">
                            {{ $event_service->event->description ?? '' }}
                        </small>
                    </div>

                    <div class="col-6 text-end">
                        @if (!isset($event_service_quote))
                            <a href="{{ route('supplier.event.service.quotes.create', $event_service->id ?? '') }}"
                                class="btn btn-success active">
                                Submit Quotation
                            </a>
                        @endif
                        <a href="{{ route('supplier.events.index') }}" class="btn btn-dark active">
                            Back
                        </a>
                    </div>
                </h5>
                <div class="table-responsive text-nowrap">

                    <!-- Check if there is a success message, if so, display it -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Supplier</th>
                                <th>Proposal Note</th>
                                <th>Budget From</th>
                                <th>Budget To</th>
                                <th>Qty</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if (!empty($event_service_quotes) && $event_service_quotes->count() && isset($event_service_quotes))
                                @foreach ($event_service_quotes as $event_service_quote)
                                    <tr class="@if (auth()->user()->id == $event_service_quote->user_id) bg-label-success @endif">

                                        <td>{{ $event_service_quote->id ?? '' }}</td>
                                        <td>
                                            <strong>
                                                <a href="{{ route('quote.supplier.info.show', $event_service_quote->supplier->id) }}"
                                                    class="btn btn-outline-primary text-dark">
                                                    @if (auth()->user()->id == $event_service_quote->user_id)
                                                        You
                                                    @else
                                                        {{ $event_service_quote->supplier->name ?? '' }}
                                                    @endif

                                                </a>
                                                @if ($event_service_quote->awarded == 1)
                                                    <a class="badge bg-label-success" title="Awarded">
                                                        <i class="bx bx-crown me-1"></i> Awarded</a>
                                                @endif
                                            </strong>
                                        </td>

                                        <td>
                                            {{ $event_service_quote->note ?? '' }}
                                        </td>

                                        <td>
                                            {{ $event_service_quote->budget_range_start ?? '' }}
                                        </td>

                                        <td>
                                            {{ $event_service_quote->budget_range_end ?? '' }}
                                        </td>

                                        <td>
                                            {{ $event_service_quote->quantity ?? '' }}
                                        </td>

                                        <td>
                                            @if ($event_service_quote->awarded == 2)
                                                <a class="btn
                                        btn-danger text-white"
                                                    title="Canceled">
                                                    <i class="bx bx-x-circle me-1"></i> Canceled</a>
                                            @elseif($event_service_quote->awarded == 1)
                                                <span class="btn btn-warning bg-label-warning"><i
                                                        class="bx bx-task me-1"></i>
                                                    Awarded </span>
                                            @elseif($event_service_quote->awarded == 3)
                                                <span class="btn btn-warning bg-label-warning"><i
                                                        class="bx bx-task me-1"></i>
                                                    Completed </span>
                                            @endif

                                            @if (auth()->user()->id == $event_service_quote->user_id &&
                                                    ($event_service_quote->awarded != 1 && $event_service_quote->awarded != 3))
                                                <a href="{{ route('supplier.event.service.quotes.edit', $event_service_quote->id ?? '') }}"
                                                    class="btn btn-success active">
                                                    Update Quotation
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">Event service not found...!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->

        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->
@endsection
