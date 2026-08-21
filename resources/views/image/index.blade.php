{{-- Dictatorship 5: HTML code only in views --}}
@extends('layouts.app') 

{{-- Dictatorship 4: Accessing data through the $viewData array --}}
@section("title", $viewData["title"]) 

@section('content') 
<div class="container"> 
  <div class="row justify-content-center"> 
    <div class="col-md-8"> 
      <div class="card"> 
        <div class="card-header">Upload image</div> 
        <div class="card-body"> 

        {{-- Dictatorship 2: Display validation errors from ImageRequest --}}
        @if($errors->any())
          <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif

        <form action="{{ route('image.save') }}" method="post" enctype="multipart/form-data"> 
          @csrf 
          <div class="form-group mb-3"> 
            <label>Image:</label> 
            <input type="file" class="form-control" name="profile_image" /> 
          </div> 
          <button type="submit" class="btn btn-primary">Submit</button> 
        </form> 
 
        <img src="{{ URL::asset('storage/test.png') }}" class="img-fluid mt-3" /> 
        </div> 
      </div> 
    </div> 
  </div> 
</div> 
@endsection