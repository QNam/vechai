@extends('admin.templates.master')

@section('content')

<section class="card p-3">
    <form action="{{ route('admin.category.store') }}" id="js--contentForm" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data['id'] ?? '' }}">
        <div class="form-group">
            <div class="row">
                <div class="col-9">
                    <label for="" class="mb-3">Tiêu đề:</label>
                    <input type="text" value="{{ $data['name'] ?? '' }}" name="name" class="form-control">
                </div>
            </div>
        </div>

        <div class="newsCreate__seo">
            <div class="form-group">
                <div class="row">
                    <div class="col-9">
                        <div class="avcollapse card">
                            <div class="avcollapse__header" data-toggle="collapse" data-target="#newsCreate__seo__wrap">
                                SEO
                            </div>
                            <div class="avcollapse__body collapse show" id="newsCreate__seo__wrap">
                                @include('admin.templates.seo', ['metaTitle' => $data['seoData']['meta_title'] ?? '', 'metaDesc' => $data['seoData']['meta_desc'] ?? '', 'metaKeyword' => $data['seoData']['meta_keyword'] ?? '',])
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="avcollapse card newsCreate__info">
                            <div class="avcollapse__header" data-toggle="collapse"
                                data-target="#newsCreate__info__setting_wrap">
                                Thông tin
                            </div>
                            {{-- <div class="avcollapse__body collapse show" id="newsCreate__info__setting_wrap">
                                <div class="mb-3">
                                    <div class="row">
                                        <b class="col-4">Hiện/Ẩn:</b>
                                        <div class="col-8">
                                            <input type="checkbox" name="status" value="1" {{ $data && $data['status'] == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="avcollapse__body collapse show">
                                <div class="mb-3">
                                    <div class="row">
                                        <b class="col-4">Hiện tại trang chủ:</b>
                                        <div class="col-8">
                                            <input type="checkbox" name="is_home" value="1" {{ $data && $data['is_home'] == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="newsCreate__submit">
            <div class="form-group">
                <button type="submit" class="avbtn__submit avbtn__submit--save">Lưu</button>
                <a href="{{ route('admin.category.index') }}" class="d-inline-block"><button  type="button" class="avbtn__submit avbtn__submit--cancel">Hủy</button></a>
            </div>
        </div>
    </form>
</section>

@endsection

@push('scripts')
{{-- <script>
    (function(){
        initEditor('#js--editor', '#js--editor__toolbar', "{{ route('media.upload') }}");
        $('#js--contentForm').submit(function(event){
            $(this).find('[name=content]').text( window.editor.getData() );
        });
        initUpload('#js--upload');
    })();
</script> --}}

@endpush