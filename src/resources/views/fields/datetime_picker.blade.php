<label>{{ $field['label'] }}</label>

<div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control"
	@foreach ($field as $attribute => $value)
    	{{ $attribute }}="{{ $value }}"
    @endforeach
    >
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>