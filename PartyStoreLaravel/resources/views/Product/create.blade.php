@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Add New Product</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
</div>
</div>
</div>

<div class="col-sm-12">
                <br>
            </div>

@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('product.store') }}" method="POST">
@csrf
<div class="row">


<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Type:</strong>
                    <select name="ProductTypeID" class="form-control">
                    <option value="">--- Select Product Type ---</option>
                   
                    <option value="1">Birthday Party</option>
                    <option value="2">Easter Party</option>
                    <option value="3">BabyShower Party</option>

                </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name/Title:</strong>
                    <input type="text" name="ProductName" class="form-control" placeholder="Product Name/ Title">
                </div>
            </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="Firstname" class="form-control" placeholder="First name">
                </div>
            </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="Surname" class="form-control" placeholder="Last name/ Surname">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="Description"
                        placeholder="Description"></textarea>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost:</strong>
                    <input type="number" step="any" name="Price" class="form-control" placeholder="Price/ Cost">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12" id="stockdiv">
<div class="form-group">
                    <strong>Stock:</strong>
                    <input type="number" name="Stock" class="form-control" placeholder="Stock">
                </div>
            </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Filname:</strong>
                    <input type="text" name="file_name" class="form-control" placeholder="File name">
                </div>
            </div>

            <div class="col-sm-12">
                <br>
            </div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>

@endsection