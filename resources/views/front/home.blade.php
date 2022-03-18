@extends('layouts.app')

@section('content')
<div class="album py-5 bg-light">
        <div class="container">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">{{$title}}</span>
          <span class="badge badge-secondary badge-pill">{{$count}} {{'resultats'}}</span>
        </h4>

          <div class="row">
          @foreach($products as $product)
            @if($product->is_visible == 1)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                    <a href="{{ route('admins.ProductDescription',$product->id)}}">

                        <img src="{{asset('images/'.$product->image)}}" alt="image" width="100%" height="350px">

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">{{'name'}} : {{$product->name}}</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold">{{'price'}}</span> : <span style="color:black;font-weight:bold">{{$product->price}}</span></button>

                            </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @if($product->state==="solde")

                                <button type="button" class="btn btn-sm btn-outline-secondary">{{$product->state}}</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold">-75%</span></button>
                                @else
                                <button type="button" class="btn btn-sm btn-outline-secondary">{{$product->state}}</button>
                                {{--<button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold">Edit</span></button> --}}
                                @endif
                            </div>
                            <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                        </div>
                    </a>
                </div>
            @endif

          @endforeach
          </div>
          {{$products->links()}}
        </div>
        
</div>
@endsection
