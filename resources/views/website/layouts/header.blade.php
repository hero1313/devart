<div class="first-transition"></div>
<!-- end first-transition -->
<div class="page-transition"></div>
<!-- end page-transition -->
<div class="search-box">
    <div class="inner">
        <form>
            <input type="search" placeholder="Tyhe here to search">
            <input type="submit" value="SEARCH">
        </form>
    </div>
</div>
<!-- end side-widget -->
<nav class="navbar">
    <div class="container">
        <div class="logo"> <a href="/"><img src="/assets/img/logo-white-ge.png" alt="Image"></a> </div>
        <!-- end logo -->
        <div class="site-menu">
            <ul>
                <li><a href="/">მთავარი</a></li>
                <li><a id="projects" href="#">პროექტები <i class="fa-solid fa-arrow-down"></i></a>
                    <ul id="project_ul">
                        <li><a class="c-white" href="{{ route('website.index.project', ['status' => '-1']) }}">აქტიური
                                პროექტები</a></li>
                        <li><a class="c-white"
                                href="{{ route('website.index.project', ['status' => '1']) }}">დასრულებული პროექტები</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route('website.index.contact') }}">კონტაქტი</a></li>
                <li><a href="{{ route('website.index.about') }}">ჩვენ შესახებ</a></li>
                <li><a href="{{ route('website.index.blog') }}">ბლოგი</a></li>
            </ul>
        </div>
        <!-- end site-menu -->
        {{-- <div class="search"> <i class="lni lni-search-alt"></i> </div> --}}
        <!-- end search -->

        <div class="hamburger">
            <div id="hamburger"> <span></span> <span></span> <span></span> </div>
            <div id="cross"> <span></span> <span></span> </div>
        </div>
        <!-- end hamburger -->
    </div>
    <!-- end container -->
</nav>

<script>
    $("#projects").click(function() {
        $("#project_ul").toggle()
    });
</script>
