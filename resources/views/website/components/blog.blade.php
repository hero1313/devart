@extends('website.index')
@section('content')
    <header class="page-header page-head">
        <!-- end container -->
    </header>
    <div class="container page-headline">
        <h1>ბლოგი</h1>
    </div>
    <!-- end page-header -->
    <section class="content-section ">
        <div class="container">
            <img src="/assets/image/{{$blog->image}}" alt="">
            <h3>{{$blog->name}}</h3>
            {!! $blog->text !!}
        </div>
        <!-- end container -->
    </section>
@stop
