<!-- browse server input -->
	<img class="output hide" src="" width="20%" height="5%" id="{{ $field['name'] }}">
	<div class="form-group form-group-default input-group">
		<label>{{ $field['label'] }}</label>

		<input type="input" class="form-control" id="{{ $field['name'] }}-text"
			@foreach ($field as $attribute => $value)
				@if($attribute != "name")
				{{ $attribute }}="{{ $value }}"
				@endif
			@endforeach
		>
		<span class="input-group-addon bg-transparent">
			<button type="button" data-inputid="{{ $field['name'] }}-file" class="btn btn-default popup_selector file_click" onclick="uploadFile('{{ $field['name'] }}-file');">
				<i class="fa fa-cloud-upload"></i> Browse uploads
			</button>
		</span>

	</div>