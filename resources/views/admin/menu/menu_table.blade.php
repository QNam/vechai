
<table class="avtable table table-hover ">
	<thead>
	<tr>
		<th width="5%">Stt</th>
		<th width="30%">Tiêu đề</th>
		<th width="20%">Trạng thái</th>
		<th width="20%">Sắp xếp</th>
		<th width="15%"></th>
	</tr>
	</thead>
	<tbody>				
	@foreach($data as $k => $v)
		<tr>
			<td class="text-bold">{{ $k + 1 }}</td>
			<td class="text-bold">{{ $v['name'] }}</td>
			<td>
				@if( $v['status'] == 1 )
				<label class="avswitch avswitch-md">
				  <input type="checkbox" checked data-url="{{ route('admin.menu.toggle_status') }}" data-action="changeStatus" data-id="{{ $v['id'] }}" >
				  <span class="slider round"></span>
				</label>
				@else
				<label class="avswitch avswitch-md">
				  <input type="checkbox" data-url="{{ route('admin.menu.toggle_status') }}" data-action="changeStatus" data-id="{{ $v['id'] }}">
				  <span class="slider round"></span>
				</label>
				@endif
			</td>
			<td>{{ $v['sort'] }}</td>
			<td>
				<a href="#modalCreateMenu{{ $v['id'] }}" data-toggle="modal" class="action action--primary"><i class="fa fa-edit"></i></a>
				<form data-form-remove="{{ $v['id'] }}" action="{{ route('admin.menu.remove') }}" class="d-inline" method="POST">
                    @csrf
					<input type="hidden" value="{{ $v['id'] }}" name="id">
					<button type="button" data-action="remove" data-form-remove="{{ $v['id'] }}" class="action action--danger"><i class="fa fa-trash-o"></i></button>	
				</form>
			</td>
		</tr>	
        @include('admin.menu.menu_create', ['parentMenu' => $parentMenu, 'data' => $v])
		@if( !empty($v['sub']) )
		@foreach($v['sub'] as $value)
		<tr>
			<td class="text-bold">--</td>
			<td class="text-bold">{{ $value['name'] }}</td>
			<td>
				@if( $value['status'] == 1 )
				<label class="avswitch avswitch-md">
				  <input type="checkbox" checked data-url="{{ route('admin.menu.toggle_status') }}" data-action="changeStatus" data-id="{{ $value['id'] }}" >
				  <span class="slider round"></span>
				</label>
				@else
				<label class="avswitch avswitch-md">
				  <input type="checkbox" data-url="{{ route('admin.menu.toggle_status') }}" data-action="changeStatus" data-id="{{ $value['id'] }}">
				  <span class="slider round"></span>
				</label>
				@endif
			</td>
			<td>{{ $value['sort'] }}</td>
			<td>
				<a href="#modalCreateMenu{{ $value['id'] }}" data-toggle="modal" class="action action--primary"><i class="fa fa-edit"></i></a>
				<form data-form-remove="{{ $value['id'] }}" action="{{ route('admin.menu.remove') }}" class="d-inline" method="POST">
                    @csrf
					<input type="hidden" value="{{ $value['id'] }}" name="id">
					<button type="button" data-action="remove" data-form-remove="{{ $value['id'] }}" class="action action--danger"><i class="fa fa-trash-o"></i></button>	
				</form>
			</td>
		</tr>
        @include('admin.menu.menu_create', ['parentMenu' => $parentMenu, 'data' => $value])
		@endforeach	
		@endif


	@endforeach
	</tbody>
</table>
