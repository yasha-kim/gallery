@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                    @include('profile.partials.update-password-form')
                    </div>
                </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                    @include('profile.partials.delete-user-form')
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
