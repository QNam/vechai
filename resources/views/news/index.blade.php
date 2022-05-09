@extends('template.layout')

@section('content')
<div class="col-md-9 left">
    <ol class="breadcrumb">
       <li><a href="{{ route('home.index') }}">Trang chủ</a></li>
       {{-- <li><a href="https://phelieuthienphat.com/category/blog" rel="tag">Blog</a></li> --}}
       @if(request()->q)
       <li class="active">Tìm kiếm "{{ request()->q }}"</li>
       @elseif(isset($category) )
       <li class="active">{{ $category->name }}</li>
        @else
        <li class="active">Tin tức</li>
        @endif
    </ol>
        @if(request()->q)
        <h1>{{ $data->total() }} Kết quả tìm kiếm với từ khóa {{ request()->q }}</h1>
        @elseif(isset($category) )
        <h1>{{ $category->name }}</h1>
        @else
        <h1>Tin tức</h1>
        @endif
    @foreach ($data as $news)
    <div class="product-thumb col-md-4">
        <a href="{{ $news->link }}" title="{{ $news->title }}">
        <div style="min-height: 160px; max-height: 160px; overflow: hidden">
            <img src="{{ $news->img_link }}" class="attachment-img-responsive size-img-responsive wp-post-image"  alt="{{ $news->title }}" /></a>
        </div>
        <h4><a href="{{ $news->link }}">{{ $news->title }}</a></h4>
    </div>
    @endforeach
    <div class="text-center my-5">
        {{ $data->links() }}
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
@endsection