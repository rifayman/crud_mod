<!-- select -->
  <div class="form-group">

    <select
            name="{{$field['name']}}"
            class="form-control"
            id="select_state">

            <option value="0" {{ ($field['value'] == 0) ? 'selected' : '' }}>Disabled</option>

	       <option value="1" {{ ($field['value'] == 1)  ? 'selected' : '' }}>Active</option>
	</select>
  </div>