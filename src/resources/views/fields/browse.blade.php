<!-- browse server input -->
  <div class="form-group">
    <label>{{ $field['label'] }}</label>
	<input
		type="input"
		class="form-control"
		id="{{ $field['name'] }}-text"
		@foreach ($field as $attribute => $value)
			@if($attribute != "name")
			{{ $attribute }}="{{ $value }}"
		  	@endif
		@endforeach

	>

	  <input
			  type="file"
			  class="form-control upload-browser"
			  style="display:none"
			  id="{{ $field['name'] }}-file"
			  data-to="{{ $field['name'] }}-text"

	  @foreach ($field as $attribute => $value)
		  {{ $attribute }}="{{ $value }}"
	  @endforeach

	  >


	<div class="btn-group" role="group" aria-label="..." style="margin-top: 3px;">
	  <button type="button" data-inputid="{{ $field['name'] }}-file" class="btn btn-default popup_selector file_click" onclick="performClick('{{ $field["name"] }}-file');">
		<i class="fa fa-cloud-upload"></i> Browse uploads
	  </button>
	</div>

  </div>