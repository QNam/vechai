@extends('template.layout')
@section('content')
<div class="col-md-12">
   <!-- slide -->
   <div id="metaslider-id-129" style="max-width: 1140px;" class="ml-slider-3-20-3 metaslider metaslider-flex metaslider-129 ml-slider nav-hidden">
      <div id="metaslider_container_129">
         <div id="metaslider_129">
            <ul aria-live="polite" class="slides">
               @foreach ($data['banners'] as $banner)
               <li style="display: block; width: 100%; max-height: 400px; overflow: hidden" class="slide-168 ms-image"><img src="{{ $banner->link }}" alt="" class="slider-129 slide-168" /></li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
   <!-- end slide -->				
</div>
<div class="col-md-12">
   <div class="row col-md-12 hidden-xs why">
      <div class="col-md-3">
         <div class="icon">
            <img src="https://phelieuthienphat.com/wp-content/themes/html5blank-stable/images/icon/icon-thu-mua-phe-lieu-gia-cao.png" alt="thu mua phe lieu gia cao">
         </div>
         <div class="text">
            <p>THU MUA GIÁ CAO</p>
            <span>Chúng tôi mang đến mức giá thu mua phế liệu cao</span>
         </div>
      </div>
      <div class="col-md-3">
         <div class="icon">
            <img src="https://phelieuthienphat.com/wp-content/themes/html5blank-stable/images/icon/icon-thu-mua-phe-lieu-tan-noi.png" alt="thu mua phe lieu tận nơi">
         </div>
         <div class="text">
            <p>THU MUA TẬN NƠI</p>
            <span>Xe vận tải của công ty đến thu mua phế liệu tận nơi</span>
         </div>
      </div>
      <div class="col-md-3">
         <div class="icon">
            <img src="https://phelieuthienphat.com/wp-content/themes/html5blank-stable/images/icon/icon-phuong-cham-hoat-dong.png" alt="phuong cham hoat dong">
         </div>
         <div class="text">
            <p>PHƯƠNG CHÂM LÀM VIỆC</p>
            <span>Tận tình, Uy tín, Chất lượng</span>
         </div>
      </div>
      <div class="col-md-3">
         <div class="icon">
            <img src="https://phelieuthienphat.com/wp-content/themes/html5blank-stable/images/icon/icon-thu-mua-phe-lieu-mien-nam.png" alt="thu mua phe lieu mien nam">
         </div>
         <div class="text">
            <p>DẪN ĐẦU TẠI MIỀN NAM</p>
            <span>Thu mua phế liệu tại TPHCM, Bình Dương, Đồng Nai...</span>
         </div>
      </div>
   </div>

   <div class="col-md-12 left">
      <div class="feature-product">
         @foreach ($data['categories_home'] as $category)
         <h2><span class="glyphicon glyphicon-th" aria-hidden="true"></span> {{ $category->name }}</h2>
         <div class="row product-home">
            @foreach ($category->newses as $news)
            <div class="col-md-4 col-xs-6">
               <a href="{{ $news->link }}" title="{{ $news->title }}">
                  <img src="{{ $news->img_link }}" class="attachment-img-responsive thumb size-img-responsive thumb wp-post-image" alt="{{ $news->title }}" />								
                  <div class="info">
                     <span class="name">{{ $news->title }}</span>
                  </div>
               </a>
            </div>
            @endforeach
         </div>
         @endforeach
      </div>
      <div class="col-md-12 promotion">
         {{ $_WEB['short_intro'] }}
      </div>
      <div class="new-product">
         <h2> <span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Tin tức - hoạt động thu mua phế liệu</h2>
         <div class="row">
            <div class="col-md-6 hot-new">
               <a href="{{ $data['news_hot']['first']['link'] }}">
               <img src="{{ $data['news_hot']['first']['img_link'] }}" class="attachment-img-responsive size-img-responsive wp-post-image" alt="{{ $data['news_hot']['first']['title'] }}"/></a>
               <div class="title">
                  <a href="{{ $data['news_hot']['first']['link'] }}">{{ $data['news_hot']['first']['title'] }}</a>
               </div>
               <p class="expect">
                  {{ $data['news_hot']['first']['seo_data']['meta_desc'] }}<a class="view-article" href="{{ $data['news_hot']['first']['link'] }}">View Article</a>									
               </p>
            </div>
            <div class="col-md-3 list-new">
               <ul class="recently">
                  @foreach ($data['news_hot']['group1'] as $news)
                  <li class="clearfix">
                     <a href="{{ $news->link }}" title="{{ $news->title }}">
                     <img src="{{ $news->img_link }}" class="attachment-img-responsive attachment-img-responsive center-block wp-post-image size-img-responsive attachment-img-responsive center-block wp-post-image wp-post-image" alt="{{ $news->title }}"/>						                      
                     </a>
                     <a href="{{ $news->link }}" title="{{ $news->title }}">{{ $news->title }}</a>
                  </li>
                  @endforeach
               </ul>
            </div>
            <div class="col-md-3 list-new-right hidden-xs">
               <ul>
                     @foreach ($data['news_hot']['group2'] as $news)
                  <li>
                     <a href="{{ $news->link }}">{{ $news->title }}</a>
                  </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection