@php
	$uploadName = $uploadName ?? "img";
	$uploadId = $uploadId ?? "js--upload";
@endphp

<div class="block__uploadSigleImae">
	<label class="avupload__triggle" for="<?= $uploadId ?>">
	<div class="avupload">
		@if(  isset($uploadImage) && $uploadImage != "" )
            <img src="{{$uploadImage}}" 
				data-content="uploadPreview" 
				data-target="#<?= $uploadId ?>" 
				class="img-fluid avupload__preview">

			<span class="avupload__plus d-none" data-content="uploadPlus"><i class="ti-plus font-weight-bold" style="font-size: 32px"></i></span>
		@else
			<img src=""  
				data-target="#<?= $uploadId ?>" 
				class="img-fluid avupload__preview" 
				data-content="uploadPreview">
				
			<span data-content="uploadPlus"  class="avupload__plus"> <i class="ti-plus font-weight-bold" style="font-size: 32px"></i>
			</span>
		@endif
	</div>
	</label>
	<input type="file" name="<?=  $uploadName ?>" class="d-none" id="<?= $uploadId ?>">
</div>