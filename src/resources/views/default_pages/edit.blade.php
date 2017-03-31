@extends('layouts.default')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<!-- Default box -->
			@if (!(isset($crud['view_table_permission']) && !$crud['view_table_permission']))
				<a href="{{ url($crud['route']) }}"><i class="fa fa-angle-double-left"></i> {{ _(trans('crud.back_to_all')) }} </a><br><br>
			@endif

			  {!! Form::open(array('url' => $crud['route'].'/'.$entry->id, 'method' => 'put', 'files' => true)) !!}
			  <div class="box">
			    <div class="box-header with-border">
			      <h3 class="box-title">{{ _(trans('crud.edit')) }}</h3>
			    </div>
			    <div class="box-body">
			      <!-- load the view from the application if it exists, otherwise load the one in the package -->
			      @if( isset($crud["is_translate"]) && $crud["is_translate"] == true ) 
                        @if( view()->exists('vendor.infinety.crud.form_content') )
                            @include('vendor.infinety.crud.form_content_languages')
                        @else
                            @include('crud::form_content_languages')
                        @endif
                    @else
                        @if( view()->exists('vendor.infinety.crud.form_content') )
                            @include('vendor.infinety.crud.form_content')
                        @else
                            @include('crud::form_content')
                        @endif
                    @endif
			    </div><!-- /.box-body -->
			    <div class="box-footer">
					@if(isset($crud["redirect_self"]) && $crud["redirect_self"] == true )
						<input type="radio" name="redirect_after_save" value="current_item_edit" id="edit_new_item" class="hidden">
						<button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-save"></i> {{ _(trans('crud.save')) }}</span></button>
					@else
						<button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-save"></i> {{ _(trans('crud.save')) }}</span></button>
						<a href="{{ url($crud['route']) }}" class="btn btn-default ladda-button" data-style="zoom-in"><span class="ladda-label">{{ _(trans('crud.cancel')) }}</span></a>
					@endif

			    </div><!-- /.box-footer-->
			  </div><!-- /.box -->
			  {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@section('scripts')
	<script type="text/javascript">
   		$( document ).ready(function() {
			@if(class_basename($crud['model']) == 'Page' )

				if($("#select_template").length > 0){
			       $("#select_template").parent().hide();
			       $("input[label='Slug']").parent().hide();
				}

			@endif
		});
	</script>
@endsection
