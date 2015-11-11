<!-- password -->
  <div class="form-group form-group-default">
    <label>{{ $field['label'] }}</label>
    <input
    	type="password"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
  </div>