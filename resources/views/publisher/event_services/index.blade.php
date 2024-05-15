@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Events </span> / Event Services </h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        {{ $event->name ?? '' }} - Event Services
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('publisher.event.services.create', $event->id) }}"
                            class="btn btn-primary justify-content-end">Create
                            Event Service</a>
                        <a href="{{ route('publisher.events.index') }}" class="btn btn-dark active">
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
                                <th>Event Service Title</th>
                                <th>Event Service Type</th>
                                <th>Note</th>
                                <th>Budget From</th>
                                <th>Budget To</th>
                                <th>Qty</th>
                                <th></th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if (!empty($event_services) && $event_services->count() && isset($event_services))
                                @foreach ($event_services as $event_service)
                                    <tr>
                                        <td>
                                            <strong>
                                                {{ $event_service->title ?? '' }}

                                                @if ($event_service->awarded() > 0)
                                                    <span class="badge bg-success"> Awarded </span>
                                                @elseif ($event_service->awarded() == 0 && $event_service->status != 'completed' && $event_service->status != 'inactive')
                                                    <span class="badge bg-success"> Open </span>
                                                @endif
                                            </strong>
                                        </td>
                                        <td>
                                            <div style="width: 320px; text-wrap: wrap;">
                                                {{ $event_service->note ?? '' }}
                                            </div>
                                        </td>

                                        <td>
                                            {{ $event_service->service->name ?? '' }}
                                        </td>

                                        <td>
                                            {{ $event_service->budget_range_start ?? '' }}
                                        </td>

                                        <td>
                                            {{ $event_service->budget_range_end ?? '' }}
                                        </td>

                                        <td>
                                            {{ $event_service->quantity ?? '' }}

                                        </td>

                                        <td>


                                            <a href="{{ route('publisher.event.service.quotes.index', $event_service->id) }}"
                                                class="btn btn-warning text-white">
                                                Quotes
                                            </a>

                                        </td>

                                        <td>
                                            @if ($event_service->status == 'publish')
                                                <span class="badge bg-label-success me-1">Publish</span>
                                            @elseif($event_service->status == 'completed')
                                                <span class="badge bg-label-warning me-1">Completed</span>
                                            @else
                                                <span class="badge bg-label-danger me-1">Inactive</span>
                                            @endif

                                        </td>

                                        <td>
                                            <a class="btn btn-icon btn-primary" title="Edit"
                                                href="{{ route('publisher.event.services.edit', $event_service->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> </a>

                                            <form class="d-inline"
                                                action="{{ route('publisher.event.services.destroy', $event_service->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-icon btn-danger" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this event service?')">
                                                    <i class="bx bx-trash-alt"></i>
                                                </button>
                                            </form>
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
