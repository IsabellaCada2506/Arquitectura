{{-- Dictatorship 5: HTML code only in views --}}
@extends('layouts.app') 

{{-- Dictatorship 4: Accessing data through the $viewData array --}}
@section("title", $viewData["title"]) 
@section("subtitle", $viewData["subtitle"]) 

@section('content') 
<div class="container"> 

  <div class="row justify-content-center"> 
    <div class="col-md-12"> 
    <h1>Available products</h1> 
    <ul> 
      @foreach($viewData["products"] as $product) 
        <li> 
          {{-- Dictatorship (Encapsulation): Using getters instead of direct attribute or array access --}}
          Id: {{ $product->getId() }} -  
          Name: {{ $product->getName() }} - 
          Price: {{ $product->getPrice() }} - 
          <a href="{{ route('cart.add', ['id'=> $product->getId()]) }}">Add to cart</a> 
        </li> 
      @endforeach 
    </ul> 
    </div> 
  </div> 

  <div class="row justify-content-center"> 
    <div class="col-md-12"> 
    <h1>Products in cart</h1> 
      <ul> 
        @foreach($viewData["cartProducts"] as $product) 
          <li> 
            {{-- Dictatorship (Encapsulation): Using getters --}}
            Id: {{ $product->getId() }} -  
            Name: {{ $product->getName() }} - 
            Price: {{ $product->getPrice() }} 
          </li> 
        @endforeach 
      </ul> 
      <a href="{{ route('cart.removeAll') }}">Remove all products from cart</a> 
    </div> 
  </div> 

</div> 
@endsection