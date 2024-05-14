@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Events </h4>

            @if (isset($events))
                @foreach ($events as $event)
                    <div class="col-12  mb-3">
                        <div class="card">
                            <h5 class="card-header">{{ $event->name }}</h5>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>
                                        {{ $event->description }}
                                    </p>
                                </blockquote>
                            </div>

                            @if ($event->eventServices->count() > 0)
                                <div class="card-body">
                                    <div class="list-group">
                                        @foreach ($event->eventServices as $eventService)
                                            <a href="javascript:void(0);"
                                                class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex justify-content-between w-100">
                                                    <h6>{{ $eventService->title }}</h6>
                                                    <small>3 days ago</small>
                                                </div>
                                                <p class="mb-1">
                                                    {{ $eventService->note }}
                                                </p>
                                                <small>Donec id elit non mi porta.</small>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->
@endsection
