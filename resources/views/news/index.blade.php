@extends('template.layout')

@section('content')
<section class="news-page">
    <div class="container">
        <h3 class="page__header">Tin tức An Vui</h3>
        <style>
        .newNews__carousel {
            margin-bottom: 40px;
        }
        </style>
        <div id="js_newNews" class="newNews__carousel owl-carousel owl-theme">
            @php $i = 0 @endphp
            @foreach($data as $key => $value)
            <div class="item newNews__item">
                <div class="news-item__thumb" style="margin-bottom: 13px">
                    <a href="{{ $value->link }}" title="{{ $value['title'] }}"><img src="{{ $value['img'] }}" class="img-fluid" title="{{ $value['title'] }}" alt="{{ $value['title'] }}"></a>
                </div>
                <h2 class="news-item__title"><a href="{{ $value->link }}" title="{{ $value['title'] }}">{{ str_limit($value['title'],150,'...') }}</a></h2>
                <div class="news-item__desc">
                    {{ !empty($value['desc']) ? str_limit($value['desc'],150,'...') : str_limit($value['seo']['meta_desc'],150,'...') }}
                </div>
                <p class="news-item__date">Ngày đăng: {{ $value['created_at_format'] }}</p>
            </div>
            @php 
                $i++; 
                if($i == 4) {
                    break;
                } 
            @endphp
            @endforeach
        </div>

        <div class="newsBanner">
            <div id="js_newBanner" class="newBanner__carousel owl-carousel owl-theme">
                <div class="item newsBanner__item">
                    <img src="https://anvui.vn/imgs/banner/banner1.jpg" alt="">
                </div>
                <div class="item newsBanner__item">
                    <img src="https://anvui.vn/imgs/banner/banner2.jpg" alt="">
                </div>
                <div class="item newsBanner__item">
                    <img src="https://anvui.vn/imgs/banner/banner3.jpg" alt="">
                </div>
            </div>
        </div>

        <style>
            .newsBanner {
                margin-bottom: 40px;
            }
            /* .newsBanner__item img {
                height: 250px;
                max-width: 100%;
            } */
        </style>

        @foreach($data as $key => $value)
        <div class="news-item">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="news-item__thumb">
                        <a href="{{ $value->link }}" title="{{ $value['title'] }}"><img src="{{ $value['img'] }}" class="img-fluid" title="{{ $value['title'] }}" alt="{{ $value['title'] }}"></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <h2 class="news-item__title"><a href="{{ $value->link }}" title="{{ $value['title'] }}">{{ $value['title'] }}</a></h2>
                    <div class="news-item__desc">
                        {{ !empty($value['desc']) ? $value['desc'] : $value['seo']['meta_desc'] }}
                    </div>
                    <p class="news-item__date">Ngày đăng: {{ $value['created_at_format'] }}</p>
                </div>    
            </div>
        </div>
        @endforeach

        <nav>
            {{ $data->links() }}
        </nav>
    </div>
</section>
@endsection