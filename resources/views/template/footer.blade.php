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
          @foreach ($data as $item)
          <div class="col-lg-3 col-md-3 col-xs-12 footer">
             <h3 class="footer-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>  {{ $item->name }}</h3>
             <ul class="list-inline">
                @if($item->subMenus->count() > 0) 
                @foreach ($item->subMenus as $sub)
                <li>
                   <a href="{{ $sub->link }}" title="Đối tác">{{ $sub->name }}</a>
                </li>
                @endforeach
                @endif
             </ul>
          </div>
          @endforeach
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
       Copyright © 2016 <a href="{{ route('home.index') }}"> {{ $_WEB['name'] }} </a>. All Rights Reversed
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