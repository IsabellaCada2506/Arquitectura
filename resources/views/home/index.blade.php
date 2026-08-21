{{-- Dictatorship 5: HTML code only in views, keeping it clean and reusable --}}
@extends('layouts.app') 

{{-- Dictatorship 4: Accessing data through the $viewData array --}}
@section('title', $viewData['title']) 

@section('content') 
<div class="text-center"> 
  Welcome to the application 
</div> 
@endsection