@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <div class="row">
    <div class="col-4">
      .col-4<br>Since 9 + 4 = 13 &gt; 12, this 4-column-wide div gets wrapped onto a new line as one contiguous unit.
    </div>
    <div class="col-6">
      <div class="panel-body">
      
        <form method="post" action="{{ route('pins.store') }}"  enctype="multipart/form-data"> 
                {{csrf_field()}}

                @method('POST')
                <div class="row">
                    <div class="mb-3">
                    <label class="col-sm-2 col-label-form">Title</label>
                
                    <input type="text" class="form-control{{ $errors->has('judulfoto') ? ' is-invalid' : '' }}" name="judulfoto" placeholder="Title" value="" />
                </div>
            </div>
            <div class="row">
                <div class="mb-3">
                    <label class=" col-label-form">Deskripsi Foto</label>
                    <textarea class="form-control{{ $errors->has('deskripsifoto') ? ' is-invalid' : '' }}" name="deskripsifoto" placeholder="deskripsifoto" value="" > </textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Upload Foto</label>
                    <input class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" name="path" type="file">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Album</label>
                    <select name="albums_id" class="form-select{{ $errors->has('albums_id') ? ' is-invalid' : '' }}" >
                        <option value="">--Pilih Album--</option>
                        @foreach(App\Models\Album::all() as $album)
                            <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn byn-primary" href="">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection

    
