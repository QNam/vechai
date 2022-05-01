@extends('admin.templates.master')

@section('content')
<section class="settingCreat" id="js--webSetting">
    <form action="{{ route('admin.web.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="settingCreat__info card">
            <div class="form-group">
                <div class="row ali-center">
                    <div class="col-2 text-right"><label for="">Tên công ty:</label></div>
                    <div class="col-4">
                    <input type="text" class="form-control" name="name" value="{{ $data['name'] ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2">
                        @include('admin.templates.upload_single_image', ['uploadImage' => $data['logo_top'] ?? '', 'uploadName' => 'logo_top', 'uploadId' => 'js--upload'])
                        <div class="mrt-5 text-center mt-3"><i>Logo trên</i></div>
                    </div>
                    <div class="col-2">
                        @include('admin.templates.upload_single_image', ['uploadImage' => $data['logo_bottom'] ?? '', 'uploadName' => 'logo_bottom', 'uploadId' => 'js--upload1'])
                        <div class="mrt-5 text-center mt-3"><i>Logo dưới</i></div>
                    </div>
                    <div class="col-2">
                        @include('admin.templates.upload_single_image', ['uploadImage' => $data['favicon'] ?? '', 'uploadName' => 'favicon', 'uploadId' => 'js--upload2'])
                        <div class="mrt-5 text-center mt-3"><i>Favicon</i></div>
                    </div>
                    <div class="col-2">
                        @include('admin.templates.upload_single_image', ['uploadImage' => $data['default_facebook_img'] ?? '', 'uploadName' => 'default_facebook_img', 'uploadId' => 'js--upload3'])
                        <div class="mrt-5 text-center mt-3"><i>Banner share mặc định</i></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-right"><label for="">Banner quản cáo:</label></div>
                    <div class="col-5">
                        @include('admin.templates.upload_single_image', ['uploadImage' => $data['banner_ad'] ?? '', 'uploadName' => 'banner_ad', 'uploadId' => 'js--upload4'])
                        <input type="text" class="form-control mt-3" name="banner_ad_link" value="{{ $data['banner_ad_link'] ?? '' }}" placeholder="Link">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-right"><label for="">Giới thiệu chung:</label></div>
                    <div class="col-6">
                    <textarea name="short_intro" class="form-control" rows="5">{{ $data['short_intro'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row ali-center">
                    <div class="col-2 text-right"><label for="">Số điện thoại:</label></div>
                    <div class="col-4">
                    <input type="text" name="phone_number" class="form-control" value="{{ $data['phone_number'] ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row ali-center">
                    <div class="col-2 text-right"><label for="">Hotline:</label></div>
                    <div class="col-4">
                    <input type="text" name="hotline" class="form-control" value="{{ $data['hotline'] ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row ali-center">
                    <div class="col-2 text-right"><label for="">Email:</label></div>
                    <div class="col-4">
                    <input type="text" name="email" class="form-control" value="{{ $data['email'] ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-right"><label for="">Map:</label></div>
                    <div class="col-6">
                    <textarea name="map" class="form-control" rows="5" placeholder=''>{{ $data['map'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-right"><label for="">Địa chỉ:</label></div>
                    <div class="col-6">
                    <div data-wrap="listAddress">
                        @foreach ($data['addresses'] as $item)
                        <div class="avaddress__item">
                            <div class="row mb-2">
                                <div class="col-5">
                                <input type="text" name="addresses[key][]" class="form-control" placeholder="Tên" value="{{ $item['key'] ?? '' }}">
                                </div>
                                <div class="col-6">
                                <input type="text" name="addresses[value][]" class="form-control" placeholder="Nội dung" value="{{ $item['value'] ?? '' }}">
                                </div>
                                <div class="col-1 text-right">
                                <button  type="button" class="btn btn-primary" data-action="minusField"></button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div data-content="templateItem">
                            <div class="avaddress__item">
                                <div class="row  mb-2">
                                <div class="col-5">
                                    <input type="text" name="addresses[key][]" class="form-control" placeholder="Tên" value="">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="addresses[value][]" class="form-control" placeholder="Nội dung" value="">
                                </div>
                                <div class="col-1 text-right">
                                    <button type="button" class="btn btn-primary" data-action="addField"></button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-right"><label for="">Mạng xã hội:</label></div>
                    <div class="col-6">
                    <div data-wrap="listSocial">
                        @foreach ($data['socials'] as $social)
                        <div class="avsocial__item" >
                            <div class="row">
                            <div class="col-5">
                                <select name="socials[key][]" class="form-control">
                                    <option value="">Chọn mạng xã hội</option>
                                    @foreach ($socialsAllow as $item)
                                    <option value="{{ $item['key'] }}" {{ $social['key'] == $item['key'] ? 'selected' : '' }}>{{ $item['value'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="text" name="socials[value][]" class="form-control" placeholder="Link" value="{{ $social['value'] }}">
                            </div>
                            <div class="col-1 text-right">
                                <button  type="button" class="btn btn-primary" data-action="addField"></button>
                            </div>
                            </div>
                        </div>
                        @endforeach
                        <div data-content="templateItem">
                            <div class="avsocial__item" >
                                <div class="row">
                                <div class="col-5">
                                    <select name="socials[key][]" class="form-control">
                                        <option value="">Chọn mạng xã hội</option>
                                        @foreach ($socialsAllow as $item)
                                        <option value="{{ $item['key'] }}">{{ $item['value'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="socials[value][]" class="form-control" placeholder="Link">
                                </div>
                                <div class="col-1 text-right">
                                    <button  type="button" class="btn btn-primary" data-action="addField"></button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="settingCreat__seo card">
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                    <div class="avcollapse ">
                        <div class="avcollapse__header" data-toggle="collapse" data-target="#newsCreate__seo__wrap">
                            SEO
                        </div>
                        <div class="avcollapse__body" id="newsCreate__seo__wrap">
                            @include('admin.templates.seo', ['metaTitle' => $data['seo']['meta_title'] ?? '', 'metaDesc' => $data['seo']['meta_desc'] ?? '', 'metaKeyword' => $data['seo']['meta_keyword'] ?? '',])
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="avbtn__submit avbtn__submit--save">Lưu</button>
        </div>
    </form>
</section>
@endsection

@push('scripts')
<script>
    plusField('[data-wrap=listAddress]');
    plusField('[data-wrap=listSocial]');
    plusField('[data-wrap=listApp]');

    initUpload('#js--upload', '#js--webSetting');
    initUpload('#js--upload1', '#js--webSetting');
    initUpload('#js--upload2', '#js--webSetting');
    initUpload('#js--upload3', '#js--webSetting');
    initUpload('#js--upload4', '#js--webSetting');
 </script>
@endpush