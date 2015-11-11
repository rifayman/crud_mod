<!-- textarea -->
  <div class="form-group form-group-default">
    <label class="control-label">{{ $field['label'] }}</label>
    <textarea
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach

    	>{{ (isset($field['value']))?$field['value']:'' }}</textarea>
  </div>