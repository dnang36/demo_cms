@include('client.layouts.header')

<body>
<header class="header">
    <div class="icon">
        <a class="icon-menu fa-solid fa-bars-staggered" href="#"></a>
    </div>
    <div class="header-menu">
        <a href="#" class="menu-item">Mua nhà</a>
        <a href="#" class="menu-item">Thuê nhà</a>
        <a href="#" class="menu-item">Khám phá</a>
        <a href="#" class="menu-item" style="border-bottom-style:solid;border-bottom-color:#D93C23;border-radius: 1px;opacity:1">Blog</a>
    </div>
    <div class="header-logo">
        <img src="{{ asset('img/123dok.png') }}" alt="" class="logo-image">
    </div>
    <div class="header-user">
        <img src="images/Notification.png" alt="" class="logo-icon2">
        <img src="./images/icon.png" alt="" class="logo-icon">
        <button class="btn">Đăng Bài</button>

        <div class="user">
            <div class="name">Nguyễn Đoàn Đăng</div>
            <div class="name-des">Intern</div>
        </div>
        <img src="./images/user.png" alt="" class="user-img">
    </div>
</header>
<div class="menu_mobile">
    <div class="mobile_header">
        <a href="#" class="mobile_close fa-solid fa-x"><img src="./images/logo.png" alt="" class="mobile_logo"></a>
    </div>
    <ul class="mobile_list">
        <li class="mb_item">Mua nhà</li>
        <li class="mb_item">Thuê nhà</li>
        <li class="mb_item">Khám phá</li>
        <li class="mb_item">Blog</li>
    </ul>
    <button class="mb_btn_up">Đăng Bài</button>
    <div class="mb_btn">
        <button class="mb_sign_in">Đăng Nhập</button>
        <button class="mb_sign_up">Đăng Kí</button>
    </div>
</div>

<div class="slider">
    <div class="slide">
        <img src="{{ asset('img/123dok.png') }}" alt="" class="logo-slider">
    </div>
</div>

<div class="content">


    <div class="nav">
        @foreach($categories as $cate)
            <a href="?category={{ $cate->id }}" class="nav-item color" >{{ $cate->name }}</a>
        @endforeach
    </div>

{{--    <div class="tin-tuc">--}}
{{--        <img src="http://demo_cms.test/public/img/img.png" alt="" class="tin-img">--}}
{{--        <p class="tin-new">Tin tức</p>--}}
{{--    </div>--}}

    <div class="cnt-tin-tuc">

{{--        <div class="cnt-1">--}}
{{--            <a href="chitiet.html" class="cnt-detail-l">--}}
{{--                @foreach($articles as $arti)--}}
{{--                <div class="cnt-img">--}}
{{--                    <img src="http://demo_cms.test/public/img/{{ $arti->thumb }}" alt="" class="cnt-img-l">--}}
{{--                </div>--}}
{{--                <h1 class="cnt-title-l">{{ $arti->title }}</h1>--}}
{{--                <div class="cnt-des">--}}
{{--                    <p class="xa-hoi">Xã hội</p>--}}
{{--                    <p class="cnt-dot"></p>--}}
{{--                    <p class="cnt-name">Nguyễn Đoàn Đăng</p>--}}
{{--                    <p class="cnt-dot"></p>--}}
{{--                    <p class="cnt-day">24/02/2020</p>--}}
{{--                </div>--}}
{{--                <p class="cnt-chinh">--}}
{{--                    {{ $arti->content }}--}}
{{--                </p>--}}
{{--                @endforeach--}}
{{--            </a>--}}

{{--            <div class="cnt-2">--}}
{{--                <a href="chitiet.html" class="cnt-detail-r">--}}
{{--                    <img src="./image/cnt_den.png" alt="" class="cnt-img-r">--}}
{{--                    <img src="./image/heart.png" alt="" class="cnt-icon">--}}
{{--                    <h1 class="cnt-title-r">Making a Housing Wage: Where  Restaurant Workers Can They Work</h1>--}}
{{--                    <div class="cnt-des">--}}
{{--                        <p class="xa-hoi">Xã hội</p>--}}
{{--                        <p class="cnt-dot"></p>--}}
{{--                        <p class="cnt-name">Nguyễn Đoàn Đăng</p>--}}
{{--                        <p class="cnt-dot"></p>--}}
{{--                        <p class="cnt-day">24/02/2020</p>--}}
{{--                    </div>--}}
{{--                    <p class="cnt-chinh-1">--}}
{{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum porta sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <a href="chitiet.html" class="cnt-detail-r">--}}
{{--                    <img src="./image/cnt_den2.png" alt="" class="cnt-img-r">--}}
{{--                    <img src="./image/heart.png" alt="" class="cnt-icon">--}}
{{--                    <h1 class="cnt-title-r">Making a Housing Wage: Where  Restaurant Workers Can They Work</h1>--}}
{{--                    <div class="cnt-des">--}}
{{--                        <p class="xa-hoi">Xã hội</p>--}}
{{--                        <p class="cnt-dot"></p>--}}
{{--                        <p class="cnt-name">Nguyễn Đoàn Đăng</p>--}}
{{--                        <p class="cnt-dot"></p>--}}
{{--                        <p class="cnt-day">24/02/2020</p>--}}
{{--                    </div>--}}
{{--                    <p class="cnt-chinh-1">--}}
{{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum porta sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="video">--}}
{{--            <div class="video-title">--}}
{{--                <p class="v-head">Video</p>--}}
{{--                <a href="" class="v-last">Xem tất cả</a>--}}
{{--            </div>--}}

{{--            <div class="video-detail">--}}
{{--                <div class="v-box1">--}}
{{--                    <img src="./image/video_detail.png" alt="" class="v-img">--}}
{{--                    <img src="./image/heart.png" alt="" class="cnt-icon">--}}
{{--                    <div class="v-detail">--}}
{{--                        <p class="v-title-r">Đi dạo cạnh đường cao tốc Pháp Vân Cầu Giẽ ổn không?</p>--}}
{{--                        <div class="cnt-des">--}}
{{--                            <p class="cnt-name">5536 lượt xem</p>--}}
{{--                            <p class="cnt-dot"></p>--}}
{{--                            <p class="cnt-day">24/02/2020</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="v-box2">--}}
{{--                    <a href="" class="v-click">--}}
{{--                        <img src="./image/video_img1.png" alt="" class="v-img">--}}
{{--                        <p class="v-title">Making a Housing Wage: Where  Restaurant should l...</p>--}}
{{--                        <div class="cnt-des">--}}
{{--                            <p class="cnt-name">5536 lượt xem</p>--}}
{{--                            <p class="cnt-dot"></p>--}}
{{--                            <p class="cnt-day">24/02/2020</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a href="" class="v-click">--}}
{{--                        <img src="./image/video_img2.png" alt="" class="v-img">--}}
{{--                        <p class="v-title">Making a Housing Wage: Where  Restaurant should l...</p>--}}
{{--                        <div class="cnt-des">--}}
{{--                            <p class="cnt-name">5536 lượt xem</p>--}}
{{--                            <p class="cnt-dot"></p>--}}
{{--                            <p class="cnt-day">24/02/2020</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a href="" class="v-click">--}}
{{--                        <img src="./image/video_img2.png" alt="" class="v-img">--}}
{{--                        <p class="v-title">Making a Housing Wage: Where  Restaurant should l...</p>--}}
{{--                        <div class="cnt-des">--}}
{{--                            <p class="cnt-name">5536 lượt xem</p>--}}
{{--                            <p class="cnt-dot"></p>--}}
{{--                            <p class="cnt-day">24/02/2020</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a href="" class="v-click">--}}
{{--                        <img src="./image/video_img2.png" alt="" class="v-img">--}}
{{--                        <p class="v-title">Making a Housing Wage: Where  Restaurant should l...</p>--}}
{{--                        <div class="cnt-des">--}}
{{--                            <p class="cnt-name">5536 lượt xem</p>--}}
{{--                            <p class="cnt-dot"></p>--}}
{{--                            <p class="cnt-day">24/02/2020</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a href="" class="v-click">--}}
{{--                        <img src="./image/video_img2.png" alt="" class="v-img">--}}
{{--                        <p class="v-title">Making a Housing Wage: Where  Restaurant should l...</p>--}}
{{--                        <div class="cnt-des">--}}
{{--                            <p class="cnt-name">5536 lượt xem</p>--}}
{{--                            <p class="cnt-dot"></p>--}}
{{--                            <p class="cnt-day">24/02/2020</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a href="" class="v-click">--}}
{{--                        <img src="./image/video_img2.png" alt="" class="v-img">--}}
{{--                        <p class="v-title">Making a Housing Wage: Where  Restaurant should l...</p>--}}
{{--                        <div class="cnt-des">--}}
{{--                            <p class="cnt-name">5536 lượt xem</p>--}}
{{--                            <p class="cnt-dot"></p>--}}
{{--                            <p class="cnt-day">24/02/2020</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="list">
            <p class="v-list">Danh sách tin</p>
            @foreach($articles as $arti)
            <a href="#" class="li-detail">
                <div class="li-des">
                    <p class="list-title">{{ $arti->title }}</p>
                    <div class="cnt-des">
                        <p class="xa-hoi">{{ $arti->category->name }}</p>
                        <p class="cnt-dot"></p>
                        <p class="cnt-name">Nguyễn Đoàn Đăng</p>
                        <p class="cnt-dot"></p>
                        <p class="cnt-day">24/02/2020</p>
                    </div>
                    <p class="li-chinh">
                        {{ $arti->description }}
                    </p>
                </div>
                <img src="{{ $arti->thumb }}" alt="anh loi" class="img-list">
            </a>
            @endforeach
        </div>
        <div class="more">
            <p class="more-text">Xem thêm</p>
        </div>
    </div>
</div>
<script src="./js/main.js"></script>
</body>
</html>
