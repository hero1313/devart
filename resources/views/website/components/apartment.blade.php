@extends('website.index')
@section('content')

    <head>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $apartment->project_id }} | {{ $apartment->number }}</title>
        <meta property="og:title" content="{{ $apartment->number }}">
        <meta property="og:image" content="/assets/image/{{ $apartment->image }}">
        <meta name="keywords" content="php,laravel,html,css">
    </head>
    <section class="apartment">
        <header class="page-header page-head">
            <!-- end container -->
        </header>
        <div class="container page-headline">
            <h1>ბლოკი A</h1>
        </div>
        <div class="container">
            <div class="row apartment-row ">
                <div class="md-12 col-md-6">
                    <div class="d-flex apartment-number">
                        <h1># {{ $apartment->number }}</h1>
                        <h5>1m2 - <span class="m2-price">{{ $apartment->price / $apartment->space }} ₾ </span> </h5>
                    </div>
                    <div class="d-flex apartment-price">
                        <h3>{{ $apartment->space }} m2</h3>
                        <h4>{{ $apartment->price }} ₾</h4>
                    </div>
                    <div class="apartment-desc">
                        <div class="d-flex">
                            <span class="desc-count">1</span>
                            <h4>საცხოვრებელი ფართი {{ $apartment->inside_space }} მ2</h4>
                        </div>
                        <div class="d-flex">
                            <span class="desc-count">2</span>
                            <h4>აივნის ფართი {{ $apartment->balcony_space }} მ2</h4>
                        </div>
                        <div class="d-flex">
                            <span class="desc-count">3</span>
                            <h4>სტატუსი <span class="status-span">
                                    @if ($apartment->status == -1)
                                        თავისუფალი
                                    @else
                                        გაყიდული
                                    @endif
                                </span></h4>
                        </div>
                    </div>
                    <div class="apartment-share">
                        <div class="d-flex block">
                            <h4 class="block-a">ბლოკი {{ $apartment->corp_number }}</h4>
                            <h4>სართული {{ $apartment->flor }}</h4>
                        </div>
                        <div class="d-flex">
                            <div class="share-buttons">
                                {!! $shareButtons !!}
                            </div>
                            <button class="btn btn-calc" data-toggle="modal" data-target="#calculators">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor"
                                    class="bi bi-calculator-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z" />
                                </svg></button>

                            <div class="d-flex img-format">
                                <h3 id="two_d">2D</h3>
                                @if ($apartment->image_d)
                                    <h3 id="three_d">3D</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-12 col-md-6 apart-image">
                    <div class="d2 apartment-image"><img src="/assets/image/{{ $apartment->image }}" alt="image"></div>
                    <div class="d3 apartment-images"><img src="/assets/image/{{ $apartment->image_d }}" alt="image"></div>
                </div>
            </div>
            <div class="center call-div">
                <a href="tel:510 10 11 22"><button type="button" class="btn call-btn">დარეკე</button></a>
            </div>
        </div>

        <div class="modal fade" id="calculators" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">საბანკო სესხის კალკულატორი</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <title> JavaScript Loan Calculator </title>
                        <table>

                            <div class="form-group">
                                <label for="exampleInputEmail1">სრული თანხა</label>
                                <input type="number" class="form-control" id="amount" value="{{ $apartment->price }}"
                                    onchange="calculate();">
                                <small id="emailHelp" class="form-text text-muted">თანხა რომლის მიღებაც გსურთ</small>
                            </div>
                            <div class="form-group col-md-12">
                                <p>სესხის საპროცენტო განაკვეთი :</p>
                                <div class="range-slider">
                                    <input class="range-slider__range" id="apr" onchange="calculate();" type="range"
                                        value="15" min="0" max="30" step="0.1">
                                    <span class="range-slider__value">0</span>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <p>სესხის გადახდის პერიოდი (წელი) :</p>
                                <div class="range-slider">
                                    <input class="range-slider__range" id="years" onchange="calculate();" type="range"
                                        value="5" min="1" max="30" step="1">
                                    <span class="range-slider__value">0</span>
                                </div>
                            </div>
                            <tr>
                                <td>თვიური გადასახადი:</td>
                                <td><span class="output" id="payment"></span></td>
                            </tr>
                            <tr>
                                <td>სრული გადასახადი:</td>
                                <td><span class="output" id="total"></span></td>
                            </tr>
                            <tr>
                                <td>საპროცენტო თანხა:</td>
                                <td><span class="output" id="totalinterest"></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">დახურვა</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/website/js/loancalculator.js"></script>
        <script>
            $("#two_d").click(function() {
                $(".apartment-image").css('display', 'none')
                $(".d2").css('display', 'block')
                $(".d3").css('display', 'none')
                $("#three_d").css('opacity', '0.5')
                $("#two_d").css('opacity', '1')
            });
            $("#three_d").click(function() {
                $("#three_d").css('opacity', '1')
                $("#two_d").css('opacity', '0.5')
                $(".apartment-image").css('display', 'none')
                $(".d3").css('display', 'block')
                $(".d2").css('display', 'none')
            });
        </script>
    </section>
@stop
