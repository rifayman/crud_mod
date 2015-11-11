
<div class="form-group form-group-default">
    {!! Form::open(['action'=>'\starter\Admin\Pages\Controllers\PageCrudController@upload', 'files'=>true]) !!}



    <div class="form-control">
        {!! Form::label('image', 'Choose an image') !!}
        {!! Form::file('image') !!}
    </div>


    {!! Form::close() !!}
</div>