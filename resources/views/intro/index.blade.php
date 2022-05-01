@extends('template.layout')

@section('content')
<section class="introPage">
    <h2>{{ __('about.greeting') }}</h2>
    <div class="container">
        <div class="row" style="padding-bottom: 40px; border-bottom: 1px solid #ECEDF1">
            <div class="col-xs-12 col-md-7">
                <h3>Giới thiệu về AN VUI</h3>
                <p class="introPage__sum">AN VUI là Startup cung cấp nền tảng quản lý điều hành tổng thể cho các doanh nghiệp vận tải hành khách đường dài.</p>
                <p><span>Với chỉ 4 năm hoạt động, AN VUI đã trở thành nhà cung cấp nền tảng phần mềm quản trị hàng đầu cho các nhà xe, giúp các nhà xe tối ưu vận hành, tăng trưởng doanh thu, xây dựng thương hiệu và mở rộng thị trường</span></p>
                <h4>SỨ MỆNH</h4>
                <p><span>AN VUI được hình thành với mục đích: “Số hoá ngành vận tải hành khách”, từ đó bảo vệ các nhà vận tải trước cuộc cách mạng công nghệ.</span></p>
                <h4>TẦM NHÌN</h4>
                <p><span>Ngành vận tải hành khách đường dài cần được tối ưu, giảm bớt lãng phí xã hội. Vì vậy, mục tiêu của AN VUI là mang lại cho cộng đồng những hành trình Đi an về vui, và mang lại giá trị kinh tế phát triển cho đất nước.</span></p>
            </div>
            <div class="col-xs-12 col-md-5">
                <iframe width="100%" height="435px" src="https://www.youtube.com/embed/G7VMiPC1pCw"></iframe>
                {{-- <img src="{{ asset('v2/thumb.svg') }}" alt="" class="img-fluid" style="margin-bottom: 16px"> --}}
                <p><span>AN VUI (với tất cả chữ cái viết hoa và cách giữa 2 chữ AN & VUI) thể hiện tinh thần mang Việt Nam ra thế giới của chúng tôi và kinh doanh từng chuyến đi đều phải An toàn và Vui vẻ.</span></p>
            </div>
        </div>

        <div class="row" style="margin-top: 40px">
            <div class="col-12">
                <h3>Thành tựu đã đạt được</h3>
                <p><span>{{ __('about.para3') }}</span></p>
                <div class="supporter">
                    <div id="js_supporter" class="supporter__carousel owl-carousel owl-theme">
                        <div class="item supporter__item">
                            <img src="{{ asset('imgs/supporter.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <p><span>{{ __('about.para4') }}</span></p>
            </div>
        </div>

        <div class="row" style="margin-top: 40px">
            <div class="col-md-12">
                <h3>Con người AN VUI</h3>
                <div id="js_slideImage" class="slideImage__carousel owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{ asset('imgs/banner1.svg') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('imgs/banner2.svg') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('imgs/banner3.svg') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('imgs/intro1.jpg') }}" alt="" style="max-height: 198px; object-fit: cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    
</style>

@endsection