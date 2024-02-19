@extends('layouts.app')

@section('content')
    <a href="{{route('home')}}" class="btn btn-warning"
            role="button" >
            <i class="fa fa-chevron-left" aria-hidden="true" style="font-size:20px;"></i>
    </a>

    <div class="container">
    <div class="row">
      <div class="col-lg-10 d-flex align-items-center">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5 mb-4 mb-md-0">
                @foreach(App\Models\Pin::all() as $pin)
                    @if($loop->index == 0)
                        <img class="img-fluid" src="images/{{$pin->path}}" alt="">
                    @endif
                @endforeach
              </div>
              <div class="col-md-7">
              
                <a class="badge badge-primary px-2" href="#">Label</a>
                @foreach(App\Models\Pin::all() as $pin)
                <h5 class="card-title my-2"><a href="#">{{$pin->judulfoto}}</a></h5>
                <p class="small text-muted">{{$pin->deskripsifoto}}</p>
                @endforeach
                <a href="#">Read more</a>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection