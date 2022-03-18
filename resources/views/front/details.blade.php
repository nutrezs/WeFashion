@extends('layouts.app')

@section('content')
 
    <div class="container">

        <div class="py-5 text-center">
          <h2>Nom du produit {{$showProduct->name}}</h2>
        </div>

        {{-- page de description d'un produit selectionné --}}

        <div class="row">
          <div class="col-md-4 order-md-2 mb-4">

            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Product name</h6>
                  <small class="text-muted">{{$showProduct->name}}</small>
                </div>
                <!-- <span class="text-muted">$12</span> -->
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Product description</h6>
                  <small class="text-muted">{{$showProduct->description}}</small>
                </div>
                <!-- <span class="text-muted">$8</span> -->
              </li>

              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Size</h6>
                  <small class="text-muted">{{$showProduct->size}}</small>
                </div>
                <span class="text-muted"></span>
              </li>

              @if($showProduct->state==="solde")
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Price</h6>
                  <small class="text-muted">{{$showProduct->price}}{{'€'}}</small>
                </div>
                <span class="text-danger" style="font-weight:bold;font-weight:bold;text-decoration: line-through;">499€</span>
              </li>
              @else

              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Price</h6>
                  <small class="text-muted">{{$showProduct->price}}{{'€'}}</small>
                </div>

              </li>

                @endif


              @if($showProduct->state==="solde")
              <li class="list-group-item d-flex justify-content-between bg-light">

                <div class="text-success">
                  <h6 class="my-0">State</h6>
                  <small>{{$showProduct->state}}</small>
                </div>
                <span class="text-danger" style="font-weight:bold;font-weight:bold;">-25%</span>
              </li>
              @else
              <li class="list-group-item d-flex justify-content-between bg-light">

                <div class="text-success">
                  <h6 class="my-0">State</h6>
                  <small>{{$showProduct->state}}</small>
                </div>

              </li>
              @endif

            </ul>



            <form class="card p-2">
                <select id="size" name='size'>
                <option value="XS">XS</option>
                <option value="S" selected>S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
              </select>
            </form>

            <form class="card p-2">


                  <button type="submit" class="btn btn-secondary">Acheter</button>


            </form>


          </div>

              <div class="col-md-8 order-md-1">
                <div class="card mb-4 shadow-sm">
                  <a href="{{ route('admins.ProductDescription',$showProduct->id)}}">

                  <img src="{{asset('images/'.$showProduct->image)}}" alt="image" width="100%" height="600px">

                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">{{'name'}} : {{$showProduct->name}}</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold">{{'price'}}</span> : <span style="color:black;font-weight:bold">{{$showProduct->price}}</span></button>

                      </div>

                    </div>
                  </div>

                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        @if($showProduct->state==="solde")
                        <button type="button" class="btn btn-sm btn-outline-secondary">{{$showProduct->state}}</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold">-75%</span></button>
                        @else
                        <button type="button" class="btn btn-sm btn-outline-secondary">{{$showProduct->state}}</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold"></span></button>
                        @endif
                      </div>
                      <small class="text-muted">9 mins</small>
                    </div>
                  </div>
                </div>
                </a>
              </div>

        </div>

    </div>

  @endsection
 
