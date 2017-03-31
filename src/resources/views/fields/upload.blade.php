
<div class="form-group form-group-default">


        @if(isset($field["value"]))
                @if(isset($crud["prepend-url-upload"]))
                        <img class="output" src="{{ url($crud["prepend-url-upload"].'uploads/'.$field["value"])  }}" width="20%" height="5%"/>
                @else
                        <img class="output" src="{{ url('uploads/'.$field["value"])  }}" width="20%" height="5%"/>
                @endif
        @else
                <img class="output" src="" width="20%" height="5%"/>
        @endif

        {!! Form::label('image', 'Choose an image') !!}
        {!! Form::file('image',['name' => $field["name"], 'id' => $field["name"],  'class' => 'upload_file']) !!}


</div>


