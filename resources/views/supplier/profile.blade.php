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

                        <form id="publisher-events-store" class="mb-3" action="{{ route('supplier.info.save') }}"
                            method="POST">
                            @csrf

                            <div class="row">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? null }}">
                                <input type="hidden" name="supplier_id" value="{{ $supplier->id ?? '' }}">

                                <div class="mb-3 col-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $supplier->name ?? '' }}" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="organization" class="form-label">Organization</label>
                                    <input type="text" name="organization" class="form-control"
                                        value="{{ $supplier->organization ?? '' }}" required>
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $supplier->email ?? '' }}" required>
                                </div>

                                <div class="mb-3 col-8">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $supplier->address ?? '' }}" required>
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" name="city" class="form-control"
                                        value="{{ $supplier->city ?? '' }}" required>
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ $supplier->phone ?? '' }}" required>
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="country" class="col-form-label"> Country </label>
                                    <select id="country" class="form-control @error('country') is-invalid @enderror"
                                        name="country">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->cca2 }}"
                                                @if ($country->cca2 == ($supplier->country ?? '')) selected @endif>
                                                {{ $country->name->common }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

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
