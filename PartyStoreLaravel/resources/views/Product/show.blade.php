@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> Show Product</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
</div>
</div>
</div>
<div class="col-sm-12">
                <br>
            </div>
<div class="container row">
<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Type: </strong>
                    {{ $product->Party_Sub_Type_ID }}                
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name/Title: </strong>
                  {{ $product->Name }}
                </div>
            </div>

<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name: </strong>
                    {{ $product->Firstname }}
                </div>
            </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name: </strong>
                  {{ $product->Surname }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description: </strong>
                    {{ $product->Description }}
                </div>
            </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost: </strong>
                    £{{ number_format($product->Price, 2) }}
                </div>
            </div>

 <div class="col-xs-12 col-sm-12 col-md-12" id="stockdiv">
<div class="form-group">
                    <strong>Stock: </strong>
                    {{ $product->Stock }}
                </div>
            </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Filname: </strong>
                    {{ $product->file_name }}
                </div>
            </div>   
            
            
</div>
@endsection