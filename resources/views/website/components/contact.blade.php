@extends('website.index')
@section('content')
    <!-- end navbar -->
    <header class="page-header page-head">
        <!-- end container -->
    </header>
    <div class="container page-headline">
        <h1>კონტაქტი</h1>
    </div>
    <!-- end page-header -->
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-box">

                        <h6>მთავარი ოფისი</h6>
                        <p>თბილისი, სამურზაყანოს 39</p>

                    </div>
                    <!-- end contact-box -->
                </div>
                <!-- end col-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-box">
                        <h6>ტელეფონი</h6>
                        <p class="mb-1 mt-3">+995 510 10 11 22</p>
                        <p>+995 510 10 11 33</p>
                    </div>
                    <!-- end contact-box -->
                </div>
                <!-- end col-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-box">
                        <h6>მოგვწერეთ</h6>
                        <p>Info@devart.ge</p>
                    </div>
                    <!-- end contact-box -->
                </div>
                <!-- end col-4 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end content-section -->
    <section class="content-section no-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title text-left">
                        <h6>მისამართი</h6>
                        <h2>გვიპოვნეთ რუკაზე</h2>
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-6 -->
                <div class="col-lg-6">
                    <form action="{{route('website.store.contact')}}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group">
                            <span>სრული სახელი</span>
                            <input name="name" required type="text">
                        </div>
                        <div class="form-group">
                            <span>ნომერი</span>
                            <input name="number" required type="text">
                        </div>
                        <!-- end form-group -->
                        <div class="form-group">
                            <span>ელფოსტა</span>
                            <input name="email" required type="text">
                        </div>
                        <!-- end form-group -->
                        <div class="form-group">
                            <span>თემა</span>
                            <input name="subject" type="text">
                        </div>
                        <!-- end form-group -->
                        <div class="form-group">
                            <input type="submit" value="გაგზავნა">
                        </div>
                        <!-- end form-group -->
                    </form>
                    <!-- end contact-form -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end content-section -->
    <section class="content-section no-spacing">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.047197741852!2d44.817188475780355!3d41.71950037532963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440d4777b0c79d%3A0x1e9deda413766b2c!2zMzkg4YOh4YOQ4YOb4YOj4YOg4YOW4YOQ4YOn4YOQ4YOc4YOd4YOhIOGDpeGDo-GDqeGDkCwg4YOX4YOR4YOY4YOa4YOY4YOh4YOY!5e0!3m2!1ska!2sge!4v1692394425346!5m2!1ska!2sge" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@stop
