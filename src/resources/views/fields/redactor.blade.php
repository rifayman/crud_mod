<!-- summernote editor -->
  <div class="form-group">
    <label>{{ $field['label'] }}</label>
    <textarea
    	class="form-control redactor"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
		id="redactor-{{ $language["iso"] }}"
    	>{!! (isset($field['value'])) ? $field['value'] : '' !!}</textarea>
  </div>
