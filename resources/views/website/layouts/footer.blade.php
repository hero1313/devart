<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <h6 class="widget-title">საკონტაქტო ინფორმაცია</h6>
                <address>
                    <p><i class="fa-solid fa-location-dot mr-2"></i> თბილისი, სამურზაყანოს 39</p>
                    <p><i class="fa-solid fa-envelope mr-2"></i> Info@devart.ge</p>
                    <p><i class="fa-solid fa-phone mr-2"></i> +995 510 10 11 22</p>
                    <p><i class="fa-solid fa-phone mr-2"></i> +995 510 10 11 33</p>

                </address>
            </div>
            <div class="col-lg-4">
                <h6 class="widget-title">სიახლეების გამოწერა</h6>
                <p>მეტი ინფორმაციისთვის გამოგვიგზავნეთ თქვენი ნომერი</p>
                <form action="{{ route('website.store.contact') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="ნომერი" name="number">
                    <input class="c-white mt-2" type="submit" value="გაგზავნა">
                </form>
            </div>
            <!-- end col-4 -->
            <div class="col-lg-4 col-md-6 footer-map">
                <h6 class="widget-title">გაყიდვების ოფისი</h6>
                <address>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.047197741852!2d44.817188475780355!3d41.71950037532963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440d4777b0c79d%3A0x1e9deda413766b2c!2zMzkg4YOh4YOQ4YOb4YOj4YOg4YOW4YOQ4YOn4YOQ4YOc4YOd4YOhIOGDpeGDo-GDqeGDkCwg4YOX4YOR4YOY4YOa4YOY4YOh4YOY!5e0!3m2!1ska!2sge!4v1692394425346!5m2!1ska!2sge"
                        width="100%" height="250" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </address>
            </div>
            <!-- end col-4 -->
            <div class="col-12">
                <div class="footer-bottom"> <span>Created By Intelleye | Software Company</span>
                    <ul>
                        <li><a href="https://www.facebook.com/devart.ge/ ">Facebook</a></li>
                        <li><a href="https://www.instagram.com/devart.geo/ ">Instagram</a></li>
                    </ul>
                </div>
                <!-- end footer-bottom -->
            </div>
            <!-- end col-12  -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    <a href="#" class="scroll-top c-white"><i class="lni lni-arrow-up"></i> <small class="c-white">ზემოთ
            ასვლა</small> </a>
    <!-- end scroll-top -->
</footer>

<div class="social-network">
        <a href="instagram.com">
            <img src="/assets/img/instagram.svg" alt="">
        </a>
        <a href="https://www.facebook.com/devart.ge/">
          <img src="/assets/img/facebook.svg" alt="">
        </a>
</div>
