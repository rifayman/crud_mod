@extends('admin.layout')

@section('custom_css')
	<!-- DATA TABLES -->
    <link type="text/css" rel="stylesheet" href="{{ asset('admin_theme/assets/plugins/jquery-datatable/media/css/jquery.dataTables.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('admin_theme/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}">
    <link media="screen" type="text/css" rel="stylesheet" href="{{ asset('admin_theme/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}">

@endsection

@section('content-header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">{{ $crud['entity_name_plural'] }}</span>
	    <small>{{ trans('crud.all') }} <span class="text-lowercase">{{ $crud['entity_name_plural'] }}</span> {{ trans('crud.in_the_database') }}.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
	    <li><a href="{{ url($crud['route']) }}" class="text-capitalize">{{ $crud['entity_name_plural'] }}</a></li>
	    <li class="active">{{ trans('crud.list') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      @if (!(isset($crud['add_permission']) && !$crud['add_permission']))
      		<a href="{{ url($crud['route'].'/create') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> {{ trans('crud.add') }} {{ $crud['entity_name'] }}</span></a>
      @endif
      @if ((isset($crud['reorder']) && $crud['reorder']))
        @if (!(isset($crud['reorder_permission']) && !$crud['reorder_permission']))
          <a href="{{ url($crud['route'].'/reorder') }}" class="btn btn-default ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-arrows"></i> {{ trans('crud.reorder') }} {{ $crud['entity_name_plural'] }}</span></a>
          @endif
      @endif
    </div>
    <div class="box-body">

		<table id="crudTable" class="table table-hover demo-table-search">
                    <thead>
                      <tr>


                        {{-- Table columns --}}
                        @foreach ($crud['columns'] as $column)
                          <th>{{ $column['label'] }}</th>
                        @endforeach

                        @if ( !( isset($crud['edit_permission']) && $crud['edit_permission'] === false && isset($crud['delete_permission']) && $crud['delete_permission'] === false ) )
                          <th>{{ trans('crud.actions') }}</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($entries as $k => $entry)
                      <tr data-entry-id="{{ $entry->id }}">



                        @foreach ($crud['columns'] as $column)
                          @if (isset($column['type']) && $column['type']=='select_multiple')
                            {{-- relationships with pivot table (n-n) --}}
                            <td><?php
                            $results = $entry->{$column['entity']}()->getResults();
                            if ($results && $results->count()) {
                                $results_array = $results->lists($column['attribute'], 'id');
                                echo implode(', ', $results_array->toArray());
                              }
                              else
                              {
                                echo '-';
                              }
                             ?></td>
                          @elseif (isset($column['type']) && $column['type']=='select')
                            {{-- single relationships (1-1, 1-n) --}}
                            <td><?php
                            if ($entry->{$column['entity']}()->getResults()) {
                                echo $entry->{$column['entity']}()->getResults()->{$column['attribute']};
                              }
                             ?></td>
                          @elseif (isset($column['type']) && $column['type']=='model_function')
                            {{-- custom return value --}}
                            <td><?php
                                echo $entry->{$column['function_name']}();
                             ?></td>
                          @else
                            {{-- regular object attribute --}}
                            <td>{{ str_limit(strip_tags($entry->$column['name']), 80, "[...]") }}</td>
                          @endif

                        @endforeach

                        @if ( !( isset($crud['edit_permission']) && $crud['edit_permission'] === false && isset($crud['delete_permission']) && $crud['delete_permission'] === false ) )
                        <td>
                          {{-- <a href="{{ Request::url().'/'.$entry->id }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> {{ trans('crud.preview') }}</a> --}}
                          @if (!(isset($crud['edit_permission']) && !$crud['edit_permission']))
                            <a href="{{ Request::url().'/'.$entry->id }}/edit" class="btn btn-xs btn-complete "><i class="fa fa-edit"></i> {{ trans('crud.edit') }}</a>
                          @endif
                           @if (!(isset($crud['delete_permission']) && !$crud['delete_permission']))
                          <a href="{{ Request::url().'/'.$entry->id }}" class="btn btn-xs btn-danger" data-button-type="delete"><i class="fa fa-trash"></i> {{ trans('crud.delete') }}</a>
                          @endif
                        </td>
                        @endif
                      </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                      <tr>

                        {{-- Table columns --}}
                        @foreach ($crud['columns'] as $column)
                          <th>{{ $column['label'] }}</th>
                        @endforeach

                        @if ( !( isset($crud['edit_permission']) && $crud['edit_permission'] === false && isset($crud['delete_permission']) && $crud['delete_permission'] === false ) )
                          <th>{{ trans('crud.actions') }}</th>
                        @endif
                      </tr>
                    </tfoot>
                  </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection

@section('custom_js')


	<!-- DATA TABES SCRIPT -->
    <script src="{{ asset('/admin_theme/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin_theme/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('/admin_theme/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin_theme/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin_theme/assets/plugins/datatables-responsive/js/lodash.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin_theme/assets/plugins/pnotify.custom.min.js') }}" type="text/javascript"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.7/api/fnReloadAjax.js" type="text/javascript"></script>

	<script type="text/javascript">




	  jQuery(document).ready(function($) {
	  	var table = $("#crudTable").DataTable({
        "language": {
              "emptyTable":     "{{ trans('crud.emptyTable') }}",
              "info":           "{{ trans('crud.info') }}",
              "infoEmpty":      "{{ trans('crud.infoEmpty') }}",
              "infoFiltered":   "{{ trans('crud.infoFiltered') }}",
              "infoPostFix":    "{{ trans('crud.infoPostFix') }}",
              "thousands":      "{{ trans('crud.thousands') }}",
              "lengthMenu":     "{{ trans('crud.lengthMenu') }}",
              "loadingRecords": "{{ trans('crud.loadingRecords') }}",
              "processing":     "{{ trans('crud.processing') }}",
              "search":         "{{ trans('crud.search') }}",
              "zeroRecords":    "{{ trans('crud.zeroRecords') }}",
              "paginate": {
                  "first":      "{{ trans('crud.paginate.first') }}",
                  "last":       "{{ trans('crud.paginate.last') }}",
                  "next":       "{{ trans('crud.paginate.next') }}",
                  "previous":   "{{ trans('crud.paginate.previous') }}"
              },
              "aria": {
                  "sortAscending":  "{{ trans('crud.aria.sortAscending') }}",
                  "sortDescending": "{{ trans('crud.aria.sortDescending') }}"
              }
          },
            "sPaginationType": "bootstrap",
            "destroy": true,
            "responsive": true,
            "scrollCollapse": true
      });

      @if (isset($crud['details_row']) && $crud['details_row']==true)
      // Add event listener for opening and closing details
      $('#crudTable tbody').on('click', 'td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row( tr );

          if ( row.child.isShown() ) {
              // This row is already open - close it
              $(this).children('i').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
              $('div.table_row_slider', row.child()).slideUp( function () {
                  row.child.hide();
                  tr.removeClass('shown');
              } );
          }
          else {
              // Open this row
              $(this).children('i').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
              // Get the details with ajax
              $.ajax({
                url: '{{ Request::url() }}/'+tr.data('entry-id')+'/details',
                type: 'GET',
                // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                // data: {param1: 'value1'},
              })
              .done(function(data) {
                // console.log("-- success getting table extra details row with AJAX");
                row.child("<div class='table_row_slider'>" + data + "</div>", 'no-padding').show();
                tr.addClass('shown');
                $('div.table_row_slider', row.child()).slideDown();
                register_delete_button_action();
              })
              .fail(function(data) {
                // console.log("-- error getting table extra details row with AJAX");
                row.child("<div class='table_row_slider'>There was an error loading the details. Please retry. </div>").show();
                tr.addClass('shown');
                $('div.table_row_slider', row.child()).slideDown();
              })
              .always(function(data) {
                // console.log("-- complete getting table extra details row with AJAX");
              });
          }
      } );
      @endif



      // make the delete button work in the first result page
      register_delete_button_action();

      // make the delete button work on subsequent result pages
      $('#crudTable').on( 'draw.dt',   function () {
         register_delete_button_action();
      } ).dataTable();

      function register_delete_button_action() {
        $("[data-button-type=delete]").unbind('click');
        // CRUD Delete
        // ask for confirmation before deleting an item
        $("[data-button-type=delete]").click(function(e) {
          e.preventDefault();
          var delete_button = $(this);
          var delete_url = $(this).attr('href');

          if (confirm("{{ trans('crud.delete_confirm') }}") == true) {
              $.ajax({
                  url: delete_url,
                  beforeSend: function (request){
                      request.setRequestHeader("X-CSRF-TOKEN", $('[name="_token"]').val());
                  },
                  type: 'DELETE',
                  success: function(result) {
                      // Show an alert with the result
                      new PNotify({
                          title: "{{ trans('crud.delete_confirmation_title') }}",
                          text: "{{ trans('crud.delete_confirmation_message') }}",
                          type: "success"
                      });
                      // delete the row from the table
                      delete_button.parentsUntil('tr').parent().remove();
                  },
                  error: function(result) {
                      // Show an alert with the result
                      new PNotify({
                          title: "{{ trans('crud.delete_confirmation_not_title') }}",
                          text: "{{ trans('crud.delete_confirmation_not_message') }}",
                          type: "warning"
                      });
                  }
              });
          } else {
              new PNotify({
                  title: "{{ trans('crud.delete_confirmation_not_deleted_title') }}",
                  text: "{{ trans('crud.delete_confirmation_not_deleted_message') }}",
                  type: "info"
              });
          }
        });
      }


	  });
	</script>
@endsection
