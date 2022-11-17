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
        <a href="{{ route('main.login') }}" class="btn">Đăng Nhap</a>

        <div class="user">
            <div class="name">{{$users->name}}</div>
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
        <div class="menu_body">
            @if(isset($categories))
                <a class="nav-item color" href="#">Tất cả</a>
                @foreach($categories as $category)
                    <a class="nav-item color"
                       href="?category={{ $category->id }}">{{$category->name}}</a>
                @endforeach
            @endif
        </div>
        </div>

{{--    <div class="tin-tuc">--}}
{{--        <img src="http://demo_cms.test/public/img/img.png" alt="" class="tin-img">--}}
{{--        <p class="tin-new">Tin tức</p>--}}
{{--    </div>--}}

    <div class="cnt-tin-tuc">

        <div class="list">
            <p class="v-list">Danh sách tin</p>
            @foreach($articles as $arti)
            <a href="{{ route('main.detail',['article'=>$arti->id]) }}" class="li-detail">
                <div class="li-des">
                    <p class="list-title">{{ $arti->title }}</p>
                    <div class="cnt-des">
                        <p class="xa-hoi">{{ $arti->category->name }}</p>
                        <p class="cnt-dot"></p>
                        <p class="cnt-name">Nguyễn Đoàn Đăng</p>
                        <p class="cnt-dot"></p>
                        <p class="cnt-day">{{  $arti->created_at   }}</p>
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
