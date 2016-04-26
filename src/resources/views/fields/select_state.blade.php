<div class="form-group">
    <?php
    $value = 0;
    if(isset($field['defaultValue'])){
        $value = $field['defaultValue'];
    }
    if(isset($field['value'])){
        if($field['value'] == 1){
            $value = 1;
        }
    }
    ?>
    <select name="{{$field['name']}}" class="form-control" id="select_state_{{ $field["name"] }}">
        <option value="0" {{ ($value == 0) ? 'selected' : '' }}>Disabled</option>
        <option value="1" {{ ($value == 1)  ? 'selected' : '' }}>Active</option>
    </select>
</div>