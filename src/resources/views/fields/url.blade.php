<!-- html5 url input -->
  <div class="form-group form-group form-group-default">
    <label>{{ $field['label'] }}</label>
    <input
    	type="url"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
  </div>