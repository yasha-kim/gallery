@extends('layouts.app')

@section('content')
  <a href="{{route('home')}}" class="btn btn-light"
          role="button" >
          <i class="fa fa-chevron-left" aria-hidden="true" style="font-size:20px;"></i>
  </a>

  <div class="container">

    <div class="row d-flex flex-wrap justify-content-center">
      <div class="col-md-10">
        <div class="card mb-4 mx-auto mt-2 py-10 bg-white rounded-5 shadow-lg">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5 mb-4 mb-md-0">
                <a href="#">
                  <img class="img-fluid rounded-4" src="{{asset('images/image1.jpg')}}" alt="">
                </a>
              </div>
              <div class="col-md-7">
                <div class="card-header">
                  <div class="dropdown-center d-flex justify-content-between">
                  <button class="btn btn-secondary" style="font-size:20px;"><i class="fa fa-download"></i></button>
                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;padding:8px;">
                      Save
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Action two</a></li>
                      <li><a class="dropdown-item" href="#">Action three</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title my-2">{{$pin->judulfoto}}</h5>
                  <p class="small text-muted">{{$pin->deskripsifoto}}</p>
                </div>
                <div class="card-footer">
                  2 days ago
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
    

  </div>  

@endsection