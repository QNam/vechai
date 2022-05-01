<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('template.layout_header_resource')
</head>
<body>
    
    <header>
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <a href="{{ $_WEB['banner_ad_link'] }}">
                 <img class="img-responsive" src="{{ $_WEB['banner_ad_img'] }}" alt="{{ $_WEB['seo']['meta_title'] }}">
                 </a>
              </div>
           </div>
           @include('template.navbar')
        </div>
     </header>

     <div class="body">
        <div class="container">
            <div class="row">
                  @yield("content")
            </div>
        </div>
     </div>

    <footer>
        <div class="container">
           <div class="row">
              <div class="col-lg-3 col-md-3 col-xs-12 footer">
                 <div class="contact-info">
                    <h3 class="footer-title"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Thông tin Liên hệ</h3>
                    @foreach ($_WEB['addressData'] as $address)
                    <p class="box-address">
                        <i class="fa fa-location-arrow"></i><span><a href="javascript:void(0)">{{ $address['key'] }}: {{$address['value'] }}</a></span>
                     </p>    
                    @endforeach
                    <p class="box-address">
                       <i class="fa fa-phone"></i>Hotline:<span> <a href="tel:{{ $_WEB['hotline'] }}">{{ $_WEB['hotline'] }}</a></span>
                    </p>
                    <p class="box-address">
                       <i class="fa fa-phone"></i>Email:<span><a href="mailto:{{ $_WEB['email'] }}">{{ $_WEB['email'] }}</a></span>
                    </p>
                 </div>
                 <div class="social-area">
                    @foreach ($_WEB['socialData'] as $social)
                    <a href="{{ $social['value'] }}" class="icon icon-mono facebook" title="Facebook" target="_blank">{{ $social['key'] }}</a>
                    @endforeach
                 </div>
              </div>
              <div class="col-lg-3 col-md-3 col-xs-12 footer">
                 <h3 class="footer-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>  Tìm kiếm nổi bật</h3>
                 <ul class="list-inline">
                    <li>
                       <a href="http://phelieuthienphat.com" title="Đối tác">Thu mua phế liệu</a>
                    </li>
                    <li>
                       <a href="http://phelieuthienphat.com" title="Đối tác">Thu mua phế liệu giá cao</a>
                    </li>
                    <li>
                       <a href="http://phelieuthienphat.com/thu-mua-phe-lieu-nhom.html" title="Đối tác">Phế Liệu Nhôm</a>
                    </li>
                    <li>
                       <a href="http://phelieuthienphat.com/thu-mua-phe-lieu-sat.html" title="Đối tác">Phe Liệu Sắt</a>
                    </li>
                    <li>
                       <a href="http://phelieuthienphat.com/thu-mua-phe-lieu-dong.html" title="Đối tác">Phế Liệu Đồng</a>
                    </li>
                    <li>
                       <a href="http://phelieuthienphat.com/thu-mua-phe-lieu-tai-thanh-pho-ho-chi-minh-tphcm.html" title="Đối tác">Thu mua phế liệu TPHCM</a>
                    </li>
                    <li>
                       <a href="http://phelieuthienphat.com/tag/thu-mua-phe-lieu-long-an" title="Đối tác">Long An</a>
                    </li>
                    <li>
                       <a href="http://phelieuthienphat.com/tag/dong-nai" title="Đối tác">Đồng Nai</a>
                    </li>
                    <li>
                       <a href="http://phelieuthienphat.com/tag/binh-duong" title="Đối tác">Bình Dương</a>
                    </li>
                 </ul>
              </div>
              @if($_WEB['facebook'])
              <div class="col-lg-3 col-md-3 col-xs-12 footer">
                 <h3 class="footer-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Facebook</h3>
                 <div class="fb-page" data-href="{{ $_WEB['facebook']['value'] }}" data-width="260" data-height="100" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                       <blockquote cite="{{ $_WEB['facebook']['value'] }}"><a href="{{ $_WEB['facebook']['value'] }}">{{ $_WEB['name'] }}</a></blockquote>
                    </div>
                 </div>
              </div>
              @endif
              <div class="col-lg-3 col-md-3 col-xs-12 footer">
                 <h3 class="footer-title"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Bản đồ</h3>
                 <iframe src="{{ $_WEB['map'] }}" width="260" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
           </div>
        </div>
        <div class="copyright">
           Copyright © 2016 <a href="{{ url('/') }}"> {{ $_WEB['name'] }} </a>. All Rights Reversed
        </div>
     </footer>
     <div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon" style="right: 170px; bottom: 170px; position: fixed;">
        <div class="phonering-alo-ph-circle"></div>
        <div class="phonering-alo-ph-circle-fill"></div>
        <a href="tel:{{ $_WEB['phone_number'] }}"></a>
        <div class="phonering-alo-ph-img-circle">
           <a href="tel:{{ $_WEB['phone_number'] }}"></a>
           <a href="tel:{{ $_WEB['phone_number'] }}" class="pps-btn-img " title="Liên hệ">
           <img src="https://i.imgur.com/v8TniL3.png" alt="Liên hệ" width="50" onmouseover="this.src='https://i.imgur.com/v8TniL3.png';" onmouseout="this.src='https://i.imgur.com/v8TniL3.png';">
           </a>
        </div>
     </div>
</body>
</html>

<link rel='stylesheet' id='metaslider-flex-slider-css'  href='https://phelieuthienphat.com/wp-content/plugins/ml-slider/assets/sliders/flexslider/flexslider.css?ver=3.20.3' media='all' property='stylesheet' />
<link rel='stylesheet' id='metaslider-public-css'  href='https://phelieuthienphat.com/wp-content/plugins/ml-slider/assets/metaslider/public.css?ver=3.20.3' media='all' property='stylesheet' />
<script type='text/javascript' id='kk-star-ratings-js-extra'>
   /* <![CDATA[ */
   var kk_star_ratings = {"action":"kk-star-ratings","endpoint":"https:\/\/phelieuthienphat.com\/wp-admin\/admin-ajax.php","nonce":"8237372d34"};
   /* ]]> */
</script>
<script type='text/javascript' src='https://phelieuthienphat.com/wp-content/plugins/kk-star-ratings/public/js/kk-star-ratings.js?ver=4.2.0' id='kk-star-ratings-js'></script>
<script type='text/javascript' src='https://phelieuthienphat.com/wp-includes/js/wp-embed.min.js?ver=5.7.6' id='wp-embed-js'></script>
<script type='text/javascript' src='https://phelieuthienphat.com/wp-content/plugins/ml-slider/assets/sliders/flexslider/jquery.flexslider.min.js?ver=3.20.3' id='metaslider-flex-slider-js'></script>
<script type='text/javascript' id='metaslider-flex-slider-js-after'>
   var metaslider_129 = function($) {$('#metaslider_129').addClass('flexslider');
               $('#metaslider_129').flexslider({ 
                   slideshowSpeed:3000,
                   animation:"fade",
                   controlNav:false,
                   directionNav:true,
                   pauseOnHover:true,
                   direction:"horizontal",
                   reverse:false,
                   animationSpeed:600,
                   prevText:"&lt;",
                   nextText:"&gt;",
                   fadeFirstSlide:false,
                   slideshow:true
               });
               $(document).trigger('metaslider/initialized', '#metaslider_129');
           };
           var timer_metaslider_129 = function() {
               var slider = !window.jQuery ? window.setTimeout(timer_metaslider_129, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_129, 1) : metaslider_129(window.jQuery);
           };
           timer_metaslider_129();
</script>
</body>
</html>