@extends('admin.templates.master')

@section('content')
<section class="card px-4 py-4">
    <div class="row">
        <div class="col-12">
			<div class="text-right">
				<a href="#modalCreateMenu" data-toggle="modal" class="btn btn-outline-primary inline-flex-cv">
					<span class="ti-plus mrr-5"></span>Tạo menu
				</a>
			</div>	
		</div>

        <div class="col-md-6">
            <h4 class="mb-3">Menu trên</h4>
            @include('admin.menu.menu_table', ['data' => $data['menu_top'], 'parentMenu' => $parentMenu])
        </div>
        <div class="col-md-6">
            <h4 class="mb-3">Menu dưới</h4>
            @include('admin.menu.menu_table', ['data' => $data['menu_bottom'], 'parentMenu' => $parentMenu])
        </div>
    </div>
    @include('admin.menu.menu_create', ['parentMenu' => $parentMenu])
</section>
@endsection

@push('scripts')
<script>
    $('[data-content=menuParent]').change(function(){
		let wrap = $(this).attr('data-wrap'); 
		let trigger = $(this).attr('data-trigger'); 
		
		if($(this).val() != 0) {
			let type = $(this).children("option:selected").attr('data-type');

			$(`${wrap} ${trigger}`).val(type)
			$(`${wrap} ${trigger}`).addClass('disable');
		} else {
			$(`${wrap} ${trigger}`).removeClass('disable');
		} 
	})
</script>
<script>
	

	$('[data-action=remove]').click(function(){

		if( !confirm('Bạn chắc chắn muốn xóa !') ) return false;

		let id = $(this).attr('data-form-remove');
		$(`form[data-form-remove=${id}]`).submit();

	})
</script>
@endpush