@extends('layouts.app')

@section('banner')
    @parent
 
    <!-- home section starts  -->

<section class="home" id="home">

<div class="content">
    <h3>best party store that you would ever have</h3>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat labore, sint cupiditate distinctio tempora reiciendis.</p>
    <a href="#" class="btn">get yours now</a>
</div>

</section>

<!-- home section ends -->
     
@endsection

@section('content')


<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image noPadding">
            <img src="images/aboutus.jpeg" alt="">
        </div>

        <div class="content">
            <h3>What makes our party special?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil voluptas culpa! Neque consectetur obcaecati sapiente?</p>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->


<div class="container paddingContainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <br>
Welcome to my Party Store.....!
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
