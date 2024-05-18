@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Events </h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        Events
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('publisher.events.create') }}" class="btn btn-primary justify-content-end">Create
                            Event</a>
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
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if (!empty($events) && $events->count() && isset($events))
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->id ?? '' }}</td>
                                        <td>
                                            <div style="width: 200px; text-wrap: wrap;"><i
                                                    class="fab fa-angular fa-lg text-danger"></i> <strong>
                                                    {{ $event->name }}
                                                </strong>
                                            </div>
                                        </td>

                                        <td>
                                            <div style="width: 320px; text-wrap: wrap;">
                                                {{ $event->description }}
                                            </div>
                                        </td>

                                        <td>
                                            @if ($event->status == 'pending')
                                                <span class="badge bg-label-warning me-1">Pending</span>
                                            @elseif ($event->status == 'published')
                                                <span class="badge bg-label-success me-1">Published</span>
                                            @else
                                                <span class="badge bg-label-danger me-1">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('publisher.event.services.index', $event->id) }}"
                                                class="btn btn-primary">
                                                Event Services
                                            </a>
                                        </td>

                                        <td>
                                            <a class="btn btn-icon btn-primary" title="Edit"
                                                href="{{ route('publisher.events.edit', $event->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> </a>

                                            <form class="d-inline"
                                                action="{{ route('publisher.events.destroy', $event->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-icon btn-danger" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this event?')">
                                                    <i class="bx bx-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Events not found...!</td>
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
