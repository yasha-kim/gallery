<!-- resources/views/albums/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $albums->nama_album }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $albums->deskripsi }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                @foreach (App\Models\Pin::all() as $pin)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $pin->judulfoto }}</h5>
                                            <p class="card-text">{{ $pin->deskripsifoto }}</p>
                                            <img src="{{ $pin->image_url }}" alt="{{ $pin->judulfoto }}" class="img-fluid">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ $pins->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection