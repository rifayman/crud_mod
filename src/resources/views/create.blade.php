@extends('admin.layout')

@section('content-header')
    <section class="content-header">
        <h1>
            {{ trans('crud.add') }} <span class="text-lowercase">{{ $crud['entity_name'] }}</span>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
            <li><a href="{{ url($crud['route']) }}" class="text-capitalize">{{ $crud['entity_name_plural'] }}</a></li>
            <li class="active">{{ trans('crud.add') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Default box -->
            @if (!(isset($crud['view_table_permission']) && !$crud['view_table_permission']))
                <a href="{{ url($crud['route']) }}"><i class="fa fa-angle-double-left"></i> {{ trans('crud.back_to_all') }} <span class="text-lowercase">{{ $crud['entity_name_plural'] }}</span></a><br><br>
            @endif

            {!! Form::open(array('url' => $crud['route'], 'method' => 'post','files' => true )) !!}
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('crud.add_a_new') }} {{ $crud['entity_name'] }}</h3>
                </div>
                <div class="box-body">
                    <!-- load the view from the application if it exists, otherwise load the one in the package -->
                    @if(view()->exists('vendor.dick.crud.form_content'))
                        @include('vendor.infinety-es.crud.form_content')
                    @else
                        @if(isset($crud["is_translate"]) && $crud["is_translate"] = true)
                            @include('crud::form_content_languages')
                        @else
                            @include('crud::form_content')
                        @endif

                    @endif
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="radio radio-primary">
                        <span>{{ trans('crud.after_saving') }}:</span>

                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio"  name="redirect_after_save" value="{{ $crud['route'] }}" checked="" id="redirect">
                                <label for="redirect">{{ trans('crud.go_to_the_table_view') }}</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="redirect_after_save" value="{{ $crud['route'].'/create' }}" id="create_new_item">
                                <label for="create_new_item">{{ trans('crud.let_me_add_another_item') }}</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="redirect_after_save" value="current_item_edit" id="edit_new_item">
                                <label for="edit_new_item">{{ trans('crud.edit_the_new_item') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('crud.add') }}</span></button>
                        <a href="{{ url($crud['route']) }}" class="btn btn-default ladda-button" data-style="zoom-in"><span class="ladda-label">{{ trans('crud.cancel') }}</span></a>

                    </div>

                </div><!-- /.box-footer-->

            </div><!-- /.box -->
            {!! Form::close() !!}
        </div>
    </div>

@endsection
