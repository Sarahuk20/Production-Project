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
            <th>Stock</th>
            <th width="280px">Action</th>

</tr>
@foreach ($products as $product)
<tr>

<td>{{ $product->id }}</td>
                <td>{{ $product->ProductName }}</td>
                <td>{{ $product->Description }}</td>                   
                    <td> {{ $product->ProductTypeID }}</td>                   
                <td>£{{ number_format($product->Price, 2) }}</td>              
                <td>{{ $product->Stock }}</td>                

<td>
<form action="{{ route('product.destroy',$product->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
@can('product-edit')
<a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
@endcan
@csrf
@method('DELETE')
@can('product-delete')
<button type="submit" class="btn btn-danger">Delete</button>
@endcan
</form>
</td>
</tr>
@endforeach
</table>
{!! $products->links() !!}

@endsection