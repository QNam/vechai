@extends('template.layout')

@section('content')
<div class="col-md-9 left">
    <ol class="breadcrumb">
       <li><a href="{{ route('home.index') }}">Trang chủ</a></li>
       {{-- <li><a href="https://phelieuthienphat.com/category/blog" rel="tag">Blog</a></li> --}}
       <li class="active">{{ $data->title }}</li>
    </ol>
    <h1 class="title-blog">
       {{ $data->title }}				
    </h1>
    <div class="content clearfix">
        {!! $data->content !!}
       <div style="display: none;"
          class="kk-star-ratings kksr-valign-bottom kksr-align-right kksr-disabled"
          data-id="1248"
          data-slug="">
          <div class="kksr-stars">
             <div class="kksr-stars-inactive">
                <div class="kksr-star" data-star="1">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
                <div class="kksr-star" data-star="2">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
                <div class="kksr-star" data-star="3">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
                <div class="kksr-star" data-star="4">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
                <div class="kksr-star" data-star="5">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
             </div>
             <div class="kksr-stars-active" style="width: 0px;">
                <div class="kksr-star">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
                <div class="kksr-star">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
                <div class="kksr-star">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
                <div class="kksr-star">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
                <div class="kksr-star">
                   <div class="kksr-icon" style="width: px; height: px;"></div>
                </div>
             </div>
          </div>
          <div class="kksr-legend">
             <span class="kksr-muted"></span>
          </div>
       </div>
    </div>
    <div class="tag-box" style="display: none">
       <div class="tags clearfix">
          <ul class="list-inline">
             <li>
                <span>Danh mục</span>
             </li>
             <li><a href="https://phelieuthienphat.com/category/blog" rel="tag">Blog</a> </li>
          </ul>
       </div>
       <div class="tags clearfix">
          <ul class="list-inline">
             <li>
                <span>Tags</span>
             </li>
             <li><a href="https://phelieuthienphat.com/tag/mua-ban-phe-lieu-tai-huyen-can-gio" rel="tag">mua bán phế liệu tại huyện cần giờ</a></li>
             <li><a href="https://phelieuthienphat.com/tag/phe-lieu-tai-can-gio-gia-cao" rel="tag">phế liệu tại cần giờ giá cao</a></li>
             <li><a href="https://phelieuthienphat.com/tag/phe-lieu-tai-can-gio-gia-tot" rel="tag">phế liệu tại cần giờ giá tốt</a></li>
             <li><a href="https://phelieuthienphat.com/tag/phe-lieu-tai-huyen-can-gio" rel="tag">phế liệu tại huyện cần giờ</a></li>
             <li><a href="https://phelieuthienphat.com/tag/thu-mua-phe-lieu-sai-gon" rel="tag">thu mua phế liệu sài gòn</a></li>
             <li><a href="https://phelieuthienphat.com/tag/thu-mua-phe-lieu-sai-gon-gia-cao" rel="tag">thu mua phế liệu sài gòn giá cao</a></li>
             <li><a href="https://phelieuthienphat.com/tag/thu-mua-phe-lieu-sai-gon-gia-tot" rel="tag">thu mua phế liệu sài gòn giá tốt</a></li>
             <li><a href="https://phelieuthienphat.com/tag/thu-mua-phe-lieu-tai-can-gio" rel="tag">thu mua phế liệu tại cần giờ</a></li>
             <li><a href="https://phelieuthienphat.com/tag/thu-mua-phe-lieu-tp-hcm" rel="tag">thu mua phế liệu tp hcm</a></li>
             <br> 
          </ul>
       </div>
       <div class="row share">
          <span class="col-md-3">Chia sẻ bài viết này </span>
          <div class="share-bottom clearfix center-block col-md-6">
             <a class="btnz share facebooks" href="http://www.facebook.com/sharer/sharer.php?u=https://phelieuthienphat.com/thu-mua-phe-lieu-tai-huyen-can-gio.html"><i class="fa fa-facebook"></i></a>
             <a class="btnz share gplus" href="https://plus.google.com/share?url=https://phelieuthienphat.com/thu-mua-phe-lieu-tai-huyen-can-gio.html"><i class="fa fa-google-plus"></i></a>
             <a class="btnz share twitters" href="https://twitter.com/intent/tweet?text={{ $data->title }}&url=https://phelieuthienphat.com/thu-mua-phe-lieu-tai-huyen-can-gio.html&via=TWITTER-USERNAME"><i class="fa fa-twitter"></i></a>
             <!-- Go to www.addthis.com/dashboard to customize your tools -->
             <div class="addthis_native_toolbox"></div>
          </div>
       </div>
    </div>
 </div>
 <!-- sidebar -->
 <div class="col-md-3 right">
    <!-- quang cao -->
    @if ($_WEB['banner_ad_right'])
    <div class="promotion-2">
       <a href="{{ $_WEB['banner_ad_right_link'] }}"  title="{{ $HEADER['meta_title'] }}" style="display: block">
         <img src="{{ asset($_WEB['banner_ad_right']) }}" alt="{{ $HEADER['meta_title'] }}" class="img-responsive">
       </a>
    </div>
    @endif
    <!-- end quang cao -->
    <!-- dai ly -->
    <!-- blog -->
    @include('news.blocks.block_news_new')
    <!-- end blog -->
    <!-- blog featured -->
    @include('news.blocks.block_news_hot')
    <!-- end blog featured-->
 </div>
 <!-- /sidebar -->
</div>
<style>
    .news-details__content img {
        max-width: 100%;
        height: auto;
    }
</style>


@endsection