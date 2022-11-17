@include('client.layouts.header')

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
            <div class="name">{{ $users->name }}</div>
            <div class="name-des">Intern</div>
        </div>
        <img src="./images/user.png" alt="" class="user-img">
    </div>
</header>
<div class="content">
    <div class="tin-chi-tiet">
        <div class="video-title" style="margin-top: 100px">
            <a href="{{ route('main.index') }}" class="tin-dir">< Quay lại</a>
            <div class="chuyen-muc">
                <p class="chuyen-muc-text">Chuyên mục: <a href="xahoi.html" class="chuyen-muc item-chuyen-muc color">{{ $article->category->name }}</a></p>
            </div>
        </div>
        <p class="title-chi-tiet">
            {{ $article->title }}
        </p>
        <div class="nav-bar">
            <div class="cnt-des">
                <p class="xa-hoi">{{$article->category->name}}</p>
                <p class="cnt-dot"></p>
                <p class="cnt-name">Nguyễn Đoàn Đăng</p>
                <p class="cnt-dot"></p>
                <p class="cnt-day">{{ $article->created_at }}</p>
            </div>
            <div class="nav-btn">
                <button class="btn-mail "><i class="fa-solid fa-envelope"></i><p class="btn-text">Gửi Mail</p></button>
                <button class="btn-facebook"><i class="fa-brands fa-facebook"></i><p class="btn-text">Chia sẻ</p></button>
                <button class="btn-save"><i class="fa-solid fa-heart"></i><p class="btn-text">Lưu</p></button>
            </div>
        </div>


        <img src="{{$article->thumb}}" alt="" class="img-chi-tiet">
        <p class="des-chi-tiet">
            {!! $article->content !!}
        </p>
        <div class="chi-tiet-anh">
            <img src="{{ $article->thumb }}" alt="" class="anh-first">
        </div>
        <div class="noi-dung-2">


            <div class="key">
                <a href="#"><p class="key1">{{ $article->tag->name }}</p></a>
            </div>
        </div>

    </div>

    <div class="list">
        <div class="tin-chi-tiet">
            <div class="video-title">
                <div class="chuyen-muc">
                    <p>Tin cùng chuyên mục:  <a href="{{ route('main.index',['article'=>$article->id]) }}" class="chuyen-muc item-chuyen-muc color">{{ $article->category->name }}</a></p>
                </div>
                <a href="{{ route('main.detail',['article'=>$article->id]) }}" class="tin-dir">Xem tất cả</a>
            </div>
        </div>
        @foreach($article_list as $list)

        <a href="{{ route('main.detail',['article'=>$article->id]) }} " class="li-detail">
            <div class="li-des">
                    <p class="list-title">{{ $list->title }}</p>
                    <div class="cnt-des">
                        <p class="xa-hoi">{{ $list->category->name }}</p>
                        <p class="cnt-dot"></p>
                        <p class="cnt-name">Nguyễn Đoàn Đăng</p>
                        <p class="cnt-dot"></p>
                        <p class="cnt-day">{{ $list->created_at }}</p>
                    </div>
                    <p class="li-chinh">
                        {{ $list->description }}
                    </p>
                </div>
                <img src="{{ $list->thumb }}" alt="" class="img-list">

        </a>
        @endforeach

    </div>
</div>
