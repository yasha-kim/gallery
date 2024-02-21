@extends('layouts.app')

@section('content')
  <a href="{{route('home')}}" class="btn btn-light rounded-circle"
          role="button" >
          <i class="fa-solid fa-arrow-left" aria-hidden="true" style="font-size:18px;"></i>
  </a>

  <div class="container">

    <div class="row d-flex flex-wrap justify-content-center" >
      <div class="col-md-10">
        <div class="card mb-4 mx-auto mt-2 py-10 bg-white rounded-5 shadow-lg" style="min-height: 420px;padding-top:0px;padding-bottom:0px;">
          <div class="card-body">
            <div class="card-group">
              <div class="card">

                  <img class="img-fluid rounded-4" src="{{asset('images/image10.jpg')}}" alt="">
              </div>
              <div class="card" style="min-height: 420px;">
                <div class="card-header">
                  
                  <div class="dropdown-center d-flex justify-content-end">
                    <button class="btn btn-warning rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px;">
                    <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Action two</a></li>
                      <li><a class="dropdown-item" href="#">Action three</a></li>
                    </ul>
                  </div>
                </div>
                  <div class="card-body">
                    
                    <h3 class="card-title my-2" style="font-weight:bold;font-size:x-large;">{{$pin->judulfoto}}</h3>
                    <p class="text-muted" style="font-size:15px;">{{$pin->deskripsifoto}}</p>
                  </div>
                  
                  <div class="card-footer">
                    <form method="POST" action="{{ route('like', ['id' => $pin->id]) }}">
                    {{csrf_field()}}

                    @method('POST')
                        <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="pins_id" value="{{ $pin->id }}">                  

                        <button type="submit"><i class="fa-solid fa-heart fa-2xl" style="color: #f39f5a;"></i>{{$pin->likes_count}}</button>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  

@endsection