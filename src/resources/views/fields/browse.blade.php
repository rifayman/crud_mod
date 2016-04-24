
	<img class="output {{ (isset($field["value"]) &&  !empty($field["value"])) ? '' : 'hide' }}" src="{{ (isset($field["value"]) &&  !empty($field["value"])) ? $field["value"] : '' }}" width="20%" height="5%" id="{{ $field['name'] }}">
	<div class="form-group form-group-default input-group">
		<label>{{ $field['label'] }}</label>

		<input type="input" class="form-control" id="{{ $field['name'] }}-text"
			@foreach ($field as $attribute => $value)
				{{ $attribute }}="{{ $value }}"
			@endforeach
		>
		<span class="input-group-addon bg-transparent">
			<button type="button" data-inputid="{{ $field['name'] }}-file" class="btn btn-default popup_selector file_click" onclick="uploadFile('{{ $field['name'] }}-file');">
				<i class="fa fa-cloud-upload"></i> Browse uploads
			</button>
		</span>

	</div>