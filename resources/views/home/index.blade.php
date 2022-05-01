@extends('template.layout')
@section('content')
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