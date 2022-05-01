@extends('admin.templates.master')

@section('content')
<section class="newsList card">
    @if( $data )
    <table id="newslist" class="avtable table table-hover ">
        <thead>
            <tr>
                <th width="5%" class="text-center">Stt</th>
                <th width="10%">Ảnh đại diện</th>
                <th width="50%">Tiêu đề</th>
                <th width="10%">Trạng thái</th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
            <tr>
                <td class="font-weight-500 text-center">{{ $key + 1 }}</td>
                <td><img src="{{ $value['img'] }}" class="img-fluid" alt=""></td>
                <td class="font-weight-500">{{ $value['title'] }}</td>
                <td>
                    @if($value['status'] == 1)
                    <label class="avswitch avswitch-md">
                    <input type="checkbox" checked data-url="{{ route('admin.recruit.ajax.update_status') }}" data-action="changeStatus" data-id="{{ $value['id'] }}">
                        <span class="slider round"></span>
                    </label>
                    @else
                    <label class="avswitch avswitch-md">
                        <input type="checkbox" data-url="{{ route('admin.recruit.ajax.update_status') }}" data-action="changeStatus" data-id="{{ $value['id'] }}">
                        <span class="slider round"></span>
                    </label>
                    @endif
                </td>
                <td>
                    <a href="{{ $value->link }}" target="_blank" class="action action--warning"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.recruit.edit', ['id' => $value['id']]) }}" class="action action--primary"><i class="fa fa-edit"></i></a>
                    <form data-form-remove="{{$value['id']}}" action="{{ route('admin.recruit.remove') }}" class="d-inline" method="POST">
                        @csrf
                        <input type="hidden" value="{{$value['id']}}" name="id">
                        <button type="button" data-action="remove" data-form-remove="{{$value['id']}}"
                            class="action action--danger"><i class="fa fa-trash-o"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center my-5">
        {{ $data->links() }}
    </div>
    
    @else
    <div class="alert alert-warning text-center" role="alert">
        Không có bài viết nào !
    </div>
    @endif
</section>
@endsection

@push('scripts')
<script>
	

	$('[data-action=remove]').click(function(){

		if( !confirm('Bạn chắc chắn muốn xóa !') ) return false;

		let id = $(this).attr('data-form-remove');
		$(`form[data-form-remove=${id}]`).submit();

	})
</script>
@endpush