@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Products</h2>
</div>
<div class="pull-right">
@can('product-create')
<a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
@endcan
</div>
</div>
</div>

<div class="col-sm-12">
                <br>
            </div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>

<th>Index</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Product Type</th>
            <th>Cost</th>          
            <th>ownername</th>
            <th width="280px">Action</th>

</tr>
@foreach ($products as $product)
<tr>

<td>{{ $product->id }}</td>
                <td>{{ $product->Name }}</td>
                <td>{{ $product->Description }}</td>                   
                    <td> {{ $product->Party_Sub_Type_ID }}</td>                   
                <td>£{{ number_format($product->Price, 2) }}</td>              
                <td>{{ $product->Firstname }} {{  $product->Surname }} </td>                

<td>
<form action="{{ route('product.destroy',$product->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>

@can('product-edit')
<a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
@endcan


@can('product-edit')
<a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
@endcan
@csrf
@method('DELETE')
@can('product-delete')
<button type="submit" name="delete" id="delete" class="btn btn-danger">Delete</button>
@endcan
</form>

@can('product-buy')
<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->Name }}" name="name">
                        <input type="hidden" value="{{ $product->Price }}" name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="btn btn-primary" id="addtocart" name="addtocart">Add To Cart</button>
                    </form>
 @endcan

</td>
</tr>
@endforeach
</table>
{!! $products->links() !!}

@endsection