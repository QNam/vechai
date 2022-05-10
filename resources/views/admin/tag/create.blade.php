@extends('admin.templates.master')

@section('content')

<section class="card p-3">
    <form action="{{ route('admin.tag.store') }}" id="js--contentForm" method="POST" enctype="multipart/form-data">
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

        <div class="newsCreate__submit">
            <div class="form-group">
                <button type="submit" class="avbtn__submit avbtn__submit--save">Lưu</button>
                <a href="{{ route('admin.tag.index') }}" class="d-inline-block"><button  type="button" class="avbtn__submit avbtn__submit--cancel">Hủy</button></a>
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