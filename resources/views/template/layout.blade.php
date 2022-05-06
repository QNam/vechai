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
     @include('template.footer')
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