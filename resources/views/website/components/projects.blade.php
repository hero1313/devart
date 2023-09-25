@extends('website.index')
@section('content')
    <!-- end navbar -->
    <header class="page-header page-head">
        <!-- end container -->
    </header>
    <div class="container page-headline">
        <h1>პროექტები</h1>
    </div>
    <!-- end page-header -->
    <section class="content-section ">
        <div class="container">
            <div class="row">
                {{-- <div class="col-12">
                    <ul class="isotope-filter">
                        <li data-filter="*" class="current">ALL</li>
                        <li data-filter=".one">BUILDING</li>
                        <li data-filter=".two">COMMERCIAL</li>
                        <li data-filter=".three">VILLAS</li>
                    </ul>
                </div> --}}
                <!-- end col-12 -->
                <div class="col-12">
                    <ul class="projects">
                        <!-- end li -->
                        @foreach ($projects as $project)
                            <li class="one">
                                <figure class="project-box">
                                    <a href="{{ route('website.show.project', $project->id) }}" class="project-a">
                                        <img class="card-img card-img-left" src="../assets/image/{{ $project->image }}"
                                            alt="Card image" />
                                    </a>
                                    <figcaption>
                                        <h5>{{ $project->name }}</h5>
                                    </figcaption>
                                </figure>
                                <!-- end project-box -->
                            </li>
                        @endforeach
                        <!-- end li -->
                    </ul>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
@stop
