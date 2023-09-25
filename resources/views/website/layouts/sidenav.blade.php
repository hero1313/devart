<aside class="side-widget">
    <div class="inner">
        <div class="logo"> <a href="index.html">
                <figure class="logo-item"> <img
                        src="/assets/img/logo-white-ge.png" alt="Image">
                </figure>
            </a> </div>
        <!-- end logo -->
        <div class="hide-mobile">
            <p>მშენებლობა თავგადასავლების გარეშე</p>
            <p>☘პირველი მულტიფუნქციური საცხოვრებელი კომპლექსი მტკვრის მარცხენა სანაპიროზე, ხუდადოვის ტყესთან</p>

            <h6 class="widget-title c-white">მისამართი</h6>
            <address class="address">
                <p>თბილისი</p>
                <p>+995 555 555 555</p>
            </address>
            <h6 class="widget-title c-white">გამოგვყევით</h6>
            <ul class="social-media">
                <li><a href="https://www.facebook.com/devart.ge/">Facebook</a></li>
                <li><a href="https://www.instagram.com/devart.geo/ ">Instagram</a></li>
            </ul>
        </div>
        <!-- end hide-mobile -->
        <div class="show-mobile">
            {{-- <div class="languages">
                <ul>
                    <li><a href="#">en</a></li>
                    <li><a href="#">ru</a></li>
                </ul>
            </div> --}}
            <!-- end languages -->
            <div class="site-menu">
                <ul>
                    <li><a href="/">მთავარი</a></li>
                    <li><a  href="{{route('website.index.project', ['status' => '-1'])}}">აქტიური პროექტები</a></li>
                    <li><a  href="{{route('website.index.project', ['status' => '1'])}}">დასრულებული პროექტები</a></li>
                    <li><a href="{{route('website.index.contact')}}">კონტაქტი</a></li>
                    <li><a href="{{route('website.index.about')}}">ჩვენ შესახებ</a></li>
                    <li><a href="{{route('website.index.blog')}}">ბლოგი</a></li>
                </ul>
            </div>
            <!-- end site-menu -->
        </div>
        <!-- end show-mobile -->
        <small>Created By Intelleye | Software Company</small>
    </div>
    <!-- end inner -->
</aside>
