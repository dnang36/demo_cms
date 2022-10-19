@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0">
                            <div class="card-body text-center">
                                <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $articles }}</span></h3>
                                <p class="text-muted font-15 mb-0">Tổng số bài viết</p>
                                <a href="{{ route('article.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-left">
                            <div class="card-body text-center">
                                <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $categories }}</span></h3>
                                <p class="text-muted font-15 mb-0">Tổng số danh mục</p>
                                <a href="{{ route('category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-left">
                            <div class="card-body text-center">
                                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $users }}</span></h3>
                                <p class="text-muted font-15 mb-0">Members</p>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-left">
                            <div class="card-body text-center">
                                <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $tags }}</span></h3>
                                <p class="text-muted font-15 mb-0">Tổng số tag</p>
                                <a href="{{ route('tag.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
