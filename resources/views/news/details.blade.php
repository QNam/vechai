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
    {{-- <div class="promotion-2">
       <img src="https://phelieuthienphat.com/wp-content/themes/html5blank-stable/images/promotion/quang-cao-thu-mua-phe-lieu.jpg" alt="Đặc sản Huế" class="img-responsive">
    </div> --}}
    <!-- end quang cao -->
    <!-- dai ly -->
    <!-- blog -->
    <div class="blog">
       <h3>Blog</h3>
       <div class="panel-body">
          <ul class="blog">
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-tai-huyen-cu-chi.html"> Thu mua phế liệu Huyện Củ Chi</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-tai-huyen-can-gio.html"> {{ $data->title }}</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-tai-quan-phu-nhuan-2.html"> Thu mua phế liệu Quận Phú Nhuận</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-tai-thu-duc.html"> Thu mua phế liệu Quận Thủ Đức</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-quan-binh-chanh.html"> Thu mua phế liệu Quận Bình Chánh</a>
             </li>
          </ul>
       </div>
    </div>
    <!-- end blog -->
    <!-- blog featured -->
    <div class="blog">
       <h3>Nổi bật</h3>
       <div class="panel-body">
          <ul class="blog">
             <li>
                <a href="https://phelieuthienphat.com/nhan-thu-mua-phe-lieu-gia-cao-tai-tphcm.html"> Nhận thu mua phế liệu giá cao tại TPHCM</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-tai-bien-hoa-dong-nai.html"> Thu mua phế liệu tại Biên Hòa &#8211; Đồng Nai</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-tai-tinh-binh-duong.html"> Thu mua phế liệu tại tỉnh Bình Dương</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/cua-hang-thu-mua-phe-lieu-o-quan-11.html"> Cửa hàng thu mua phế liệu ở Quận 11</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/cong-ty-thu-mua-phe-lieu-tai-quan-9-tp-ho-chi-minh.html"> Công ty thu mua phế liệu tại Quận 9 Tp Hồ Chí Minh</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-quan-7-hcm.html"> Thu mua phế liệu quận 7 HCM</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-tai-thanh-pho-ho-chi-minh-tphcm.html"> Thu mua phế liệu tại Thành phố Hồ Chí Minh (TPHCM)</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thanh-ly-nha-xuong.html"> Thanh lý nhà xưởng</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-may-moc-cu.html"> Thu mua máy móc cũ</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-thep.html"> Thu mua phế liệu thép</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-inox.html"> Thu mua phế liệu inox</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-nhua.html"> Thu mua phế liệu nhựa</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-giay.html"> Thu mua phế liệu giấy</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-nhom.html"> Thu mua phế liệu nhôm</a>
             </li>
             <li>
                <a href="https://phelieuthienphat.com/thu-mua-phe-lieu-dong.html"> Thu mua phế liệu đồng</a>
             </li>
          </ul>
       </div>
    </div>
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