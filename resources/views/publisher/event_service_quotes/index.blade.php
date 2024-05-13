@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Events </span> / Event Services Quotes
            </h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        Event Service Quotes
                        @if ($event_service->status == 'completed')
                            <span class="badge bg-label-warning"> Completed </span>
                        @elseif ($awarded == 0)
                            <span class="badge bg-label-success"> Open </span>
                        @else
                            <span class="badge bg-success"> Awarded </span>
                        @endif
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('publisher.event.services.index', $event_service->event->id ?? '') }}"
                            class="btn btn-dark active">
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

                    <table class="table">
                        <thead>
                            <tr>
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
                                    <tr>
                                        <td>
                                            <strong>
                                                <a href="{{ route('publisher.event.service.quote.supplier.info', $event_service_quote->supplier->id) }}"
                                                    class="btn btn-outline-primary text-dark">
                                                    {{ $event_service_quote->supplier->name ?? '' }}
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
                                            @if ($event_service_quote->awarded == 0 && $awared == 0 && $event_service->status != 'completed')
                                                <form class="d-inline"
                                                    action="{{ route('publisher.event.service.quotes.award', $event_service_quote->id) }}"
                                                    method="POST">
                                                    @csrf

                                                    <button type="submit" class="btn btn-primary" title="Submit Award"
                                                        onclick="return confirm('Are you sure you want to award this event service?')">
                                                        <i class="bx bx-crown me-1"></i> Award
                                                    </button>
                                                </form>
                                            @elseif($event_service_quote->awarded == 2)
                                                @if ($awarded == 0 && $event_service->status != 'completed')
                                                    <form class="d-inline"
                                                        action="{{ route('publisher.event.service.quotes.award', $event_service_quote->id) }}"
                                                        method="POST">
                                                        @csrf

                                                        <button type="submit" class="btn btn-primary" title="Submit Award"
                                                            onclick="return confirm('Are you sure you want to award this event service?')">
                                                            <i class="bx bx-crown me-1"></i> Award
                                                        </button>
                                                    </form>
                                                @endif

                                                <a class="btn btn-danger text-white" title="Canceled">
                                                    <i class="bx bx-x-circle me-1"></i> Canceled</a>
                                            @elseif($event_service_quote->awarded == 1)
                                                <form class="d-inline"
                                                    action="{{ route('publisher.event.service.quotes.completed', $event_service_quote->id) }}"
                                                    method="POST">
                                                    @csrf

                                                    <button type="submit" class="btn btn-success" title="Submit Award"
                                                        onclick="return confirm('Are you sure you want to complete this event service?')">
                                                        <i class="bx bx-select-multiple me-1"></i> Complete
                                                    </button>
                                                </form>

                                                <form class="d-inline"
                                                    action="{{ route('publisher.event.service.quotes.cancel', $event_service_quote->id) }}"
                                                    method="POST">
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger" title="Submit Award"
                                                        onclick="return confirm('Are you sure you want to awarded this event service?')">
                                                        <i class="bx bx-x me-1"></i> Cancel
                                                    </button>
                                                </form>
                                            @elseif($event_service_quote->awarded == 3)
                                                <span class="btn btn-warning bg-label-warning"><i
                                                        class="bx bx-task me-1"></i> Completed </span>
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
