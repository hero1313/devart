@extends('website.index')
@section('content')
    <header class="slider white-space-bottom">
        <div class="container">
            <div class="swiper-container slider-content">
                <div class="swiper-wrapper">
                    @foreach ($slides as $slide )
                        <div class="swiper-slide">
                            {{-- <div class="inner">
                                {{$slide->text}}
                            </div> --}}
                            <div class="inner">
                                <h2 class="mb-4">{{$slide->text}}</h2>
                                <a class="project-btn" href="{{route('website.index.project')}}">პროექტები<i class="lni lni-arrow-right"></i></a>
                            </div>
                            <!-- end inner -->
                        </div>
                    @endforeach
                    <!-- end swiper-slide -->
                </div>
                <!-- end swiper-wrapper -->
                <div class="controls">
                    <div class="swiper-pagination"></div>
                    <!-- end swiper-pagination -->
                    <div class="button-prev"><i class="lni lni-arrow-left"></i></div>
                    <!-- end button-prev -->
                    <div class="button-next"><i class="lni lni-arrow-right"></i></div>
                    <!-- end button-next -->
                </div>
                <!-- end controls -->

            </div>
            <!-- end slider-content -->
            <div class="swiper-container slider-main">
                <div class="swiper-wrapper">
                    @foreach ($slides as $slide )
                    <div class="swiper-slide">
                        <div class="slide-image" data-background="/assets/image/{{$slide->image}}"></div>
                    </div>
                    @endforeach
                </div>
                <!-- end swiper-wrapper -->
                <div class="header-box c-white"> <b>15</b> <small>წლიან გამოცდილება</small> </div>
                <!-- end header-box -->
            </div>
            <!-- end slider-main -->
        </div>
        <!-- end container -->
    </header>
    <!-- end slider -->
    <section class="content-section no-spacing">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section-title mt-5">
                        <h2>კომპანიის შესახებ</h2>
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-12 -->
                <div class="col-lg-6">
                    <figure class="side-image"><img src="/assets/img/logo-green-ge.png" alt="Image"></figure>
                    <!-- end side-image -->
                </div>
                <!-- end col-6 -->
                <div class="col-lg-6">
                    <div class="side-content">
                        <h5>დევარტ გრინ გარდენსი</h5>
                        <p>დევარტ გრინ გარდენსი არის პირველი სამშენებლო კომპანია, რომელიც მტკვრის მარცხენა სანაპიროს ფილტვებად წოდებულ ხუდადოვის რეკრეაციულ ზონასთან მრავალფუნქციურ საცხოვრებელ კომპლექსს აშენებს.</p>
                        <p>პროექტი გამოირჩევა თავისი უნიკალური ისტორიით, გეგმარებით, ადგილმდებარეობითა და თანამედროვე არქიტექტურით.მშენებლობა ითვალისწინებს თბილისის განაშენიანების ყველა პრინციპებს, დევარტ გრინ გარდენსის პროექტი 100%-ით ეკო მეგობრულია.
                        </p>
                    </div>
                    <!-- end side-content -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end content-section -->
    <section class="content-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="counter-box"> <span class="odometer" data-count="10" data-status="yes">0</span>
                        <span class="value">#</span>
                        <h6>დასრულებული პროექტი</h6>
                    </div>
                    <!-- end counter-box -->
                </div>
                <!-- end col-3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="counter-box"> <span class="odometer" data-count="950" data-status="yes">0</span>
                        <span class="value">+</span>
                        <h6>მობინადრე</h6>
                    </div>
                    <!-- end counter-box -->
                </div>
                <!-- end col-3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="counter-box"> <span class="odometer" data-count="15" data-status="yes">0</span>
                        <span class="value">+</span>
                        <h6>წლიანი გამოცდილება</h6>
                    </div>
                    <!-- end counter-box -->
                </div>
                <!-- end col-3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="counter-box"> <span class="odometer" data-count="75000" data-status="yes">0</span>
                        <span class="value">m²</span>
                        <h6>დასრულებული მშენებლობა</h6>
                    </div>
                    <!-- end counter-box -->
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end content-section -->
    {{-- <section class="content-section white-space-bottom" data-background="#f7f6f1">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title text-left">
                        <h2>დასრულებული პროექტები</h2>
                    </div>
                </div>
                <div class="col-lg-5">
                    <p>Our diverse portfolio represents decades of construction experience backed by a passion for
                        quality, outstanding client service industry technologies.</p>
                </div>
            </div>
        </div>
        <div class="swiper-container project-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <figure class="project-box"> <a href="#"><img src="images/slide02.jpg" alt="Image"></a>
                        <figcaption>
                            <h5>Life Science Center</h5>
                            <p>The building opened in 2020 and includes more than 120+ flats</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="project-box"> <a href="#"><img src="images/slide03.jpg" alt="Image"></a>
                        <figcaption>
                            <h5>Life Science Center</h5>
                            <p>The building opened in 2020 and includes more than 120+ flats</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="project-box"> <a href="#"><img src="../images/slide01.jpg" alt="Image"></a>
                        <figcaption>
                            <h5>Life Science Center</h5>
                            <p>The building opened in 2020 and includes more than 120+ flats</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section> --}}
    <!-- end content-section -->
    {{-- <section class="content-section calculator">
        <div class="bg-image" data-background="images/section-bg01.jpg"></div>
        <!-- end bg-image -->
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>საბანკო სესხის კალკულატორი</h2>
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-12 -->
                <div class="col-lg-10">
                    <form class="form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <p>How many rooms :</p>
                                <div class="range-slider">
                                    <input class="range-slider__range" id="value1" type="range" value="30000"
                                        min="0" max="50000" step="10000">
                                    <span class="range-slider__value">0</span>
                                </div>
                                <!-- edn range-slider -->
                            </div>
                            <!-- end form-group -->
                            <div class="form-group col-md-6">
                                <p>Number of floor :</p>
                                <div class="range-slider">
                                    <input class="range-slider__range" id="value2" type="range" value="5000"
                                        min="0" max="10000" step="1000">
                                    <span class="range-slider__value">0</span>
                                </div>
                                <!-- edn range-slider -->
                            </div>
                            <!-- end form-group -->
                            <div class="form-group col-lg-4 col-md-6">
                                <p>Energy Type :</p>
                                <select id="value3">
                                    <option value="0">Select Now</option>
                                    <option value="10000">Electricity</option>
                                    <option value="15000">Natural Gas</option>
                                    <option value="20000">Solar Panel</option>
                                </select>
                            </div>
                            <!-- end form-group -->

                            <div class="form-group col-lg-4 col-md-6">
                                <p>Bathroom :</p>
                                <select id="value4">
                                    <option value="0">Select Now</option>
                                    <option value="10000">1 Bathroom</option>
                                    <option value="15000">2 Bathrooms</option>
                                    <option value="20000">3 Bathrooms</option>
                                </select>
                            </div>
                            <!-- end form-group -->

                            <div class="form-group col-lg-4 col-md-12">
                                <p>Terrace :</p>
                                <div class="yes-no" id="yes-no">
                                    <input type="radio" name="rdo" id="yes" value="15000" checked />
                                    <input type="radio" name="rdo" id="no" value="0" />
                                    <div class="switch c-white">
                                        <label class="c-white" for="yes">Yes</label>
                                        <label class="c-white" for="no">No</label>
                                        <span></span>
                                    </div>
                                </div>
                                <!-- end yes-no -->
                            </div>
                            <!-- end form-group -->

                            <div class="form-group col-12">
                                <div class="info-box"> <i class="lni lni-checkmark-circle"></i> Explore Cheatsheet to
                                    Start Using With Your Projects. </div>
                                <!-- end info-box -->
                                <div class="price-box c-white"> <small>Estimated Price :</small> <span>$ <b
                                            id="result">0</b></span> </div>
                                <!-- end price-box -->
                            </div>
                            <!-- end form-group -->
                        </div>
                        <!-- end form row -->
                    </form>
                    <!-- end mortgage-form -->
                </div>
                <!-- end col-9 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section> --}}
    <!-- end content-section -->
    {{-- <div class="content-section" data-background="#f7f6f1">
        <div class="container">
            <div class="row no-gutters partners">
                @foreach($partners as $partner)
                <div class="col-lg-2 col-md-4 col-6">
                    <figure class="logo-item"> <img src="/assets/image/{{$partner->image}}" alt="Image"> </figure>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- end content-section -->
    {{-- <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>ბლოგი</h2>
                    </div>
                </div>
                @foreach ($blogs as $blog)
                    <div class="col-lg-4">
                        <a href="{{ route('website.index.show', $blog->id) }}">
                            <div class="news-box">
                                <figure>
                                    <img src="/assets/image/{{ $blog->image }}" alt="Image">
                                </figure>
                                <div class="content "> <small class="c-white">{{ $blog->created_at->format('j F, Y') }}</small>
                                    <h3>
                                        {{ $blog->name }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
@stop
