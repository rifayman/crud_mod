@extends('layouts.default')

@section('content')
<div class="container">
<a href="{{ url($crud['route']) }}"><i class="fa fa-angle-double-left"></i> {{ trans('crud.back_to_all') }} <span class="text-lowercase">{{ $crud['entity_name_plural'] }}</span></a><br><br>
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('crud.preview') }} <span class="text-lowercase">{{ $crud['entity_name'] }}</h3>
    </div>
    <div class="box-body">
      {{ dump($entry) }}
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div>
@endsection
