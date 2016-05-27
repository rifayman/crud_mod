

    @if(!isset($field["browse"]) || $field["browse"] == 'image')
    <img class="output {{ (isset($field["value"]) &&  !empty($field["value"])) ? '' : 'hide' }}" src="{{ (isset($field["value"]) &&  !empty($field["value"])) ? $field["value"] : '' }}" width="20%" height="5%" id="{{ $field['name'] }}">
	@endif

    <div class="form-group form-group-default input-group">
		<label>{{ $field['label'] }}</label>

		<input type="input" class="form-control" id="{{ $field['name'] }}{{ (isset($language)) ? '-'.$language["iso"] : '' }}-text"
			@foreach ($field as $attribute => $value)
				@if($attribute != 'id')
				{{ $attribute }}="{{ $value }}"
				@endif

			@endforeach
		>


		<?php
		$url = url(config('filemanager.defaultRoute', 'admin/filemanager').'/dialog')."?type=featured";
		if(isset($field["browse"])){
			$url.= "&filter=".$field["browse"];
		}
		$url.= "&appendId=".$field['name'];
        if(isset($language)){
            $url .= '-'.$language["iso"];
        }
        $url .= '-text';
		?>
		<span class="input-group-addon bg-transparent">
			<button type="button" data-inputid="{{ $field['name'] }}-file" class="btn btn-default popup_selector file_click" onclick="uploadFile('{{ $url }}');">
				<i class="fa fa-cloud-upload"></i> Browse uploads
			</button>
		</span>

	</div>