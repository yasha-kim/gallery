@extends('layouts.app')

@section('content')
<div class="py-3 px-sm-5">     
    <div class="row justify-content-center">
        <div class="col-4 col-lg-4 order-lg-2">
            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                <a href="javascript:;">
                    <img src="/img/team-2.jpg"
                        class="rounded-circle img-fluid border border-2 border-white">
                </a>
            </div>
        </div>
    </div>
    
    <div class="card-body pt-0">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <div class="d-grid text-center">
                        <span class="text-lg font-weight-bolder">22</span>
                        <span class="text-sm opacity-8">Friends</span>
                    </div>
                    <div class="d-grid text-center mx-4">
                        <span class="text-lg font-weight-bolder">10</span>
                        <span class="text-sm opacity-8">Photos</span>
                    </div>
                    <div class="d-grid text-center">
                        <span class="text-lg font-weight-bolder">89</span>
                        <span class="text-sm opacity-8">Comments</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            @foreach(App\Models\User::all() as $user)
            <h5>
                {{$user->name}}<span class="font-weight-light">, 35</span>
            </h5>
            @endforeach
            <div class="h6 font-weight-300">
                <i class="ni location_pin mr-2"></i>Bucharest, Romania
            </div>
            <div class="h6 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
            </div>
            <div>
                <i class="ni education_hat mr-2"></i>University of Computer Science
            </div>
        </div>
    </div>
</div>


<div class="d-flex justify-content-center">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
        <label class="btn btn-outline-primary" for="btnradio1">Created</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio2">Saved</label>

    </div>
</div>

<div class="content1">
    <div class="card-header text-center border-0 pt-4 pt-lg-3 pb-4 pb-lg-3 px-4">
        <div class="d-flex justify-content-end">
               
            <div class="dropdown dropleft">
                <button class="btn btn-warning"
                        type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        +
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <h6 class="dropdown-header">Create</h6>
                <hr>
                    <a class="dropdown-item" role="button" data-toggle="modal" data-target="#exampleModal">Album</a>
                    <a class="dropdown-item" href="{{route('create-pin')}}">Pin</a>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h2 class="modal-title" id="exampleModalLabel">Create Album</h2>
                            
                        </div>
                        <div class="modal-body">
                            <form class="p-10 mw-5xl mx-auto bg-light-light " action="{{route('store')}}">
                                <div class="row g-8">
                                {{csrf_field()}}

                                <div class="col-12 pb-3 ">
                                    <div class="form-group text-start">
                                    <label class="mb-1 fw-medium text-light-dark" for="modalInput2-7">Title</label>
                                    <input class="form-control" name="nama_album" type="text" placeholder="Like 'Places to Go' or 'Recipes to Make">
                                    </div>
                                </div>
                                <div class="col-12 pb-3">
                                    <div class="form-group text-start">
                                    <label class="mb-1 fw-medium text-light-dark" for="modalInput2-8">Description</label>
                                    <textarea class="form-control" name="deskripsi"></textarea>
                                    </div>
                                </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning" style="font-size:18px;">Create</button>
                                </div>
                                
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="columns-1 gap-4 space-y-4 p-4 sm:columns-2 md:columns-3 lg:columns-4">
        @foreach (App\Models\Pin::with('user')->get() as $pin) 
        <div class="relative mb-4 before:content-[''] before:rounded-md before:absolute before:inset-0 before:bg-black before:bg-opacity-20">
        <img class="w-full rounded-full" src="images/{{$pin->path}}">
            <div class="test__body absolute inset-0 p-8 text-white flex flex-col">
                <div class="relative">
                    <a class="test__link absolute inset-0" target="_blank" href="/"></a>
                    <h1 class="test__title text-md font-bold mb-3 ">{{$pin->judulfoto}}</h1>
                </div>
                <div class="mt-auto">
                    <span class="test__tag bg-white bg-opacity-60 py-1 px-4 rounded-md text-black">Author</span>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>

<div id="content2" style="display:none;">
    This is content for radio button 2.
</div>


@endsection
