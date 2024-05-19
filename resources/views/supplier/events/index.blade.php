@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Events </h4>

            @if ($events->count() > 0)
                @foreach ($events as $event)
                    @if (\Carbon\Carbon::parse($event->expired_at)->isPast())
                        @php $expired = true; @endphp
                    @else
                        @php $expired = false; @endphp
                    @endif
                    <div class="col-12  mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-between w-100">
                                <h5 class="card-header">{{ $event->name }}</h5>
                                @if (\Carbon\Carbon::parse($event->expired_at)->isPast())
                                    <small class="m-4 badge bg-danger text-dange"> Expired</small>
                                @elseif ($event->expired_at)
                                    <small class="m-4  text-warning"> Expired At:
                                        {{ \Carbon\Carbon::parse($event->expired_at)->diffForHumans() }} </small>
                                @endif
                            </div>

                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p> {{ $event->description }} </p>
                                </blockquote>

                                <div class="d-flex justify-content-between w-100">
                                    <p class="text-muted text-light mt-3 col-6">
                                        Location: {{ $event->address }}, {{ $event->city }}, {{ $event->country }}
                                        <br>
                                        Event Start:
                                        {{ $event->start_datetime ? \Carbon\Carbon::parse($event->start_datetime)->format('l, F jS Y, g:i A') : 'N/A' }}
                                        <br>
                                        Event End:
                                        {{ $event->end_datetime ? \Carbon\Carbon::parse($event->end_datetime)->format('l, F jS Y, g:i A') : 'N/A' }}
                                    </p>

                                    <a href="{{ route('supplier.publisher.info.show', $event->eventPublisher->id) }}">
                                        <div class="btn btn-outline-primary">
                                            <i class="text-muted">About Event Organizer</i>
                                            <p class="card-text">
                                                <strong> {{ $event->eventPublisher->name }}</strong>
                                                <br>
                                                {{ $event->eventPublisher->organization }}
                                                <br>
                                                {{ $event->eventPublisher->email }}
                                        </div>
                                    </a>
                                </div>
                            </div>

                            @if ($event->eventServices->count() > 0)
                                <div class="card-body">
                                    <div class="list-group">
                                        @foreach ($event->eventServices as $eventService)
                                            @if ($eventService->status != 'inactive')
                                                <a @if ($expired == false) href=" {{ route('supplier.event.service.quotes.index', $eventService->id) }}" @endif
                                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="d-flex justify-content-between w-100">
                                                        <h6>{{ $eventService->title }}</h6>
                                                        <small>
                                                            {{ $eventService->created_at->diffForHumans() }}
                                                            @if ($expired == true)
                                                                <span class="badge bg-danger"> Expired </span>
                                                            @elseif ($eventService->awarded() > 0)
                                                                <span class="badge bg-warning"> Awarded </span>
                                                            @elseif ($eventService->awarded() == 0 && $eventService->status != 'completed' && $eventService->status != 'inactive')
                                                                <span class="badge bg-success"> Open </span>
                                                            @elseif($eventService->status == 'completed')
                                                                <span class="badge bg-info"> Completed </span>
                                                            @endif
                                                        </small>


                                                    </div>
                                                    <p class="mb-1">
                                                        {{ $eventService->note }}
                                                    </p>
                                                    <small class="row">
                                                        <div class="col-6">
                                                            <i>Service Type:</i> {{ $eventService->service->name }} </br>
                                                            <i>Qty:</i> {{ $eventService->quantity }} </br>
                                                            <i>Quotations:</i> {{ $eventService->quotations->count() }}
                                                        </div>
                                                        <div class="text-end col-6">
                                                            Est. Budget: LKR {{ $eventService->budget_range_start }}
                                                            @if ($eventService->budget_range_start !== $eventService->budget_range_end)
                                                                - {{ $eventService->budget_range_end }}
                                                            @endif
                                                        </div>
                                                    </small>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="card-body">
                                    <div class="list-group">
                                        <a href="javascript:void(0);"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex justify-content-between w-100">
                                                <h6>Event Service not found..!</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12  mb-3">
                    <div class="card">
                        <h5 class="card-header">Events not found..!</h5>
                    </div>
                </div>
            @endif

        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->
@endsection
