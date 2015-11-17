
<div class="form-group form-group-default">

    @if(isset($field["value"]))
        <img class="output" src="{{ asset('uploads/'.$field["value"]) }}" width="20%" height="5%"/>
    @endif
    {!! Form::label('image', 'Choose an image') !!}
    {!! Form::file('image[]',['class' => 'joint'],array('multiple'=>true)) !!}


</div>