@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-6">
                        Publisher Info
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ url()->previous() }}" class="btn btn-dark active">
                            Back
                        </a>
                    </div>
                </h5>

                <div class="table-responsive text-nowrap">
                    <div class="container">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ $event_publisher->name ?? '' }}" readonly>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="organization" class="form-label">Organization</label>
                                <input type="text" name="organization" class="form-control"
                                    value="{{ $event_publisher->organization ?? '' }}" readonly>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ $event_publisher->email ?? '' }}" readonly>
                            </div>

                            <div class="mb-3 col-8">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ $event_publisher->address ?? '' }}" readonly>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" class="form-control"
                                    value="{{ $event_publisher->city ?? '' }}" readonly>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ $event_publisher->phone ?? '' }}" readonly>
                            </div>

                            <div class="mb-3 col-4">
                                <label for="country" class="col-form-label"> Country </label>
                                <select id="country" class="form-control @error('country') is-invalid @enderror"
                                    name="country" readonly>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->cca2 }}"
                                            @if ($country->cca2 == ($event_publisher->country ?? '')) selected @endif>
                                            {{ $country->name->common }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->
@endsection
