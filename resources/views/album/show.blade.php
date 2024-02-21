<!-- resources/views/albums/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $album->nama_album }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $album->deskripsi }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection