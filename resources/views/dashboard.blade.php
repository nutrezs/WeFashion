@extends('layouts.app')

@section('content')
<div class="album py-5 bg-light">
<div class="container">
<div class="col-sm-12">
      <h1 style="font-size:30px;"class="display-3">Product</h1>
      <div style="margin-left:950px;">
        <a style="margin: 19px;" href="{{ route('admin.create')}}" class="btn btn-primary">New product</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <td>Name</td>
            <td>category</td>
            <td>Price</td>
            <td>etat</td>

            <td colspan = 2>Publier</td>
            <td colspan = 2>Actions</td>
          </tr>
        </thead>
        <tbody>



          @foreach($shops as $shop)
          <tr>

            <td>{{$shop->name}}</td>

            <td>{{$shop->categorie['name']}}</td>


            <td>{{$shop->price}}</td>

            <td>{{$shop->state}}</td>

            @if($shop->is_visible == 1)
                <td>
                <a href="{{route('admin.publish',$shop->id)}}" class="btn btn-primary">publier</a>
                </td>
            @else
                <td>
                <a href="{{route('admin.publish',$shop->id)}}" class="btn btn-secondary">non publié</a>
                </td>
            @endif

            <td>
              <a href="{{ route('admin.edit',$shop->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>

              <form class="btn btn-danger" action="{{ route('admin.destroy', $shop->id)}}" method="post">
                @csrf
                @method('POST')
               <button onclick="deleted()" class="btn btn-danger " type="submit">Delete</button>

              </form>
            </td>

            <script>
            function deleted(){
              alert('es tu sure de vouloir supprimer ce produit?');
            }
            </script>

          </tr>
          @endforeach

        </tbody>
      </table>

      {{$shops->links()}}

    </div>
</div>
</div>
@endsection
