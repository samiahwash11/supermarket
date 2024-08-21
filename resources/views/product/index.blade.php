@extends('product.layout')

@section('content')


<div class="jumbotron container">

    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('product.create')}}" role="button">Create  </a>
    <a class="btn btn-primary btn-lg" href="{{ route('product.trash')}}" role="button">trash  </a>


  </div>

  <div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{$message}}
        </div>
      @endif

  </div>


  <div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Product price</th>
            <th scope="col">detail</th>


            <th scope="col" style="width: 400px">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}Eg</td>
                <td>{{ $product->detail }}</td>

                <td>

                    <div class="row">
                        <div class="d-flex gap-2">
                            <a  class="btn btn-success mx-2" href="{{ route('product.edit',$product->id)}}"> Edit </a>
                            <a  class="btn btn-primary " href="{{ route('product.show',$product->id)}}"> show </a>.
                            <a  class="btn btn-secondary mx-2" href="{{ route('product.softDelete',$product->id)}}"> softDelete </a>
                            <a  class="btn btn-warning" onclick="return confirm(' هل تريد حذف المنتج
                             {{ $product->name }}؟')" href="{{ route('product.delete',$product->id)}}">  delete </a>

                        </div>



                </td>
              </tr>
            @endforeach

        </tbody>
      </table>

     {!! $products->links() !!}
  </div>

@endsection
