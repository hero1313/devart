@extends('website.index')
@section('content')
    <header class="page-header page-head">
        <!-- end container -->
    </header>
    <div class="container page-headline">
        <h1>ბლოგი </h1>
    </div>
    <!-- end page-header -->
    <section class="content-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    @foreach ($blogs as $blog)
                        <a href="{{ route('website.index.show', $blog->id) }}">
                            <div class="news-box">
                                <figure>
                                    <img src="/assets/image/{{$blog->image}}" alt="Image">
                                </figure>
                                <div class="content"> <small class="blog-date">{{$blog->created_at->format('j F, Y')}}</small>
                                    <h3>
                                        {{$blog->name}}
                                    </h3>
                                    <!-- end author -->
                                </div>
                                <!-- end content -->
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
@stop
