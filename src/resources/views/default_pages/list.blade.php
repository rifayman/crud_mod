@extends('layouts.app')


@section('content')
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link media="screen" type="text/css" rel="stylesheet" href="//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
    <link type="text/css" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.css">
    <link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<div class="container">
            <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            @if (!(isset($crud['add_permission']) && !$crud['add_permission']))
                <a href="{{ url($crud['route'].'/create') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> {{ _(trans('crud.add')) }} {{ _($crud['entity_name']) }}</span></a>
            @endif
            @if ((isset($crud['reorder']) && $crud['reorder']))
                @if (!(isset($crud['reorder_permission']) && !$crud['reorder_permission']))
                    <a href="{{ url($crud['route'].'/reorder') }}" class="btn btn-default ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-arrows"></i> {{ _(trans('crud.reorder')) }} {{ _($crud['entity_name_plural']) }}</span></a>
                @endif
            @endif

            <div class="row col-md-3 pull-right no-margin no-padding">
                <div class="col-xs-12 no-margin no-padding">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder=" {{ _(trans('crud.search')) }} ">
                </div>
            </div>
        </div>
        <div class="box-body">

            <table id="crudTable" class="table table-hover demo-table-search">
                <thead>
                <tr>

                    @foreach ($crud['columns'] as $column)
                        @if($column['name'] == "id")
                            <th style="width:30px">{{ $column['label'] }}</th>
                        @else
                            <th>{{ $column['label'] }}</th>
                        @endif
                    @endforeach

                    @if ( !( isset($crud['edit_permission']) && $crud['edit_permission'] === false && isset($crud['delete_permission']) && $crud['delete_permission'] === false ) )
                            <th style="min-width:150px">{{ _(trans('crud.actions')) }}</th>
                    @endif

                </tr>
                </thead>
                <tbody>
                @if(isset($crud["ajax_load"]) && $crud["ajax_load"] == true )

                @else
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
                                    @if(trim($entry->$column['name']) == "")
                                        @if(isset($crud["is_translate"]) && $crud["is_translate"] == true)
                                            <?php $entry->$column['name'] = $entry->translate()->$column['name']; ?>
                                        @endif
                                    @endif
                                    <td>{{ str_limit(strip_tags($entry->$column['name']), 80, "[...]") }}</td>
                                @endif

                            @endforeach

                            @if ( !( isset($crud['edit_permission']) && $crud['edit_permission'] === false && isset($crud['delete_permission']) && $crud['delete_permission'] === false ) )
                                <td>
                                    {{-- <a href="{{ Request::url().'/'.$entry->id }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> {{ trans('crud.preview') }}</a> --}}
                                    @if (!(isset($crud['edit_permission']) && !$crud['edit_permission']))
                                        <a href="{{ Request::url().'/'.$entry->id }}/edit" class="btn btn-xs btn-complete "><i class="fa fa-edit p-r-10"></i> {{ _(trans('crud.edit')) }}</a>
                                    @endif
                                    @if (!(isset($crud['delete_permission']) && !$crud['delete_permission']))
                                        <a href="{{ Request::url().'/'.$entry->id }}" class="btn btn-xs btn-danger m-l-5" data-button-type="delete"><i class="fa fa-trash p-r-10"></i> {{ _(trans('crud.delete')) }}</a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif


                </tbody>
            </table>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
    
@endsection
@section('scripts')

            <!-- DATA TABES SCRIPT -->
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/tabletools/2.2.0/js/dataTables.tableTools.min.js" type="text/javascript" ></script>
    <script src="//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.13.1/lodash.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.7/api/fnReloadAjax.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.js" type="text/javascript"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" type="text/javascript"></script>
    <script type="text/javascript">




        jQuery(document).ready(function($) {


            @if(isset($crud["ajax_load"]) && $crud["ajax_load"] == true )

                table = $('#crudTable');
                var settings = {
                        "language": {
                            "emptyTable":     "{{ _(trans('crud.emptyTable')) }}",
                            "info":           "{{ _(trans('crud.info')) }}",
                            "infoEmpty":      "{{ _(trans('crud.infoEmpty')) }}",
                            "infoFiltered":   "{{ _(trans('crud.infoFiltered')) }}",
                            "infoPostFix":    "{{ _(trans('crud.infoPostFix')) }}",
                            "thousands":      "{{ _(trans('crud.thousands')) }}",
                            "lengthMenu":     "{{ _(trans('crud.lengthMenu')) }}",
                            "loadingRecords": "{{ _(trans('crud.loadingRecords')) }}",
                            "processing":     "{{ _(trans('crud.processing')) }}",
                            "search":         "{{ _(trans('crud.search')) }}",
                            "zeroRecords":    "{{ _(trans('crud.zeroRecords')) }}",
                            "paginate": {
                                "first":      "{{ _(trans('crud.paginate.first')) }}",
                                "last":       "{{ _(trans('crud.paginate.last')) }}",
                                "next":       "{{ _(trans('crud.paginate.next')) }}",
                                "previous":   "{{ _(trans('crud.paginate.previous')) }}"
                            },
                            "aria": {
                                "sortAscending":  "{{ _(trans('crud.aria.sortAscending')) }}",
                                "sortDescending": "{{ _(trans('crud.aria.sortDescending')) }}"
                            }
                        },
                        "sDom": "<'table-responsive't><'row'<p i>>",
                        "destroy": true,
                        "responsive": true,
                        "scrollCollapse": true,
                        "processing": true,
                        "serverSide": true,
                        "iDisplayLength": 50,
                        "ajax" : "{{ url($crud["route"]) }}/getData",
                        "columns": [
                            @foreach($crud["columns"] as $column)
                            {data: "{{ $column["name"] }}", name: "{{ $column["name"] }}" },
                            @endforeach
                            @if ( !( isset($crud['edit_permission']) && $crud['edit_permission'] === false && isset($crud['delete_permission']) && $crud['delete_permission'] === false ) )
                            {data: 'actions', name: 'actions'}
                            @endif
                        ]
                    };
                table.dataTable(settings);
                $('#search-table').keyup(function() {
                    table.fnFilter($(this).val());
                });
            @else
                var table = $("#crudTable").DataTable({
                        "language": {
                            "emptyTable":     "{{ _(trans('crud.emptyTable')) }}",
                            "info":           "{{ _(trans('crud.info')) }}",
                            "infoEmpty":      "{{ _(trans('crud.infoEmpty')) }}",
                            "infoFiltered":   "{{ _(trans('crud.infoFiltered')) }}",
                            "infoPostFix":    "{{ _(trans('crud.infoPostFix')) }}",
                            "thousands":      "{{ _(trans('crud.thousands')) }}",
                            "lengthMenu":     "{{ _(trans('crud.lengthMenu')) }}",
                            "loadingRecords": "{{ _(trans('crud.loadingRecords')) }}",
                            "processing":     "{{ _(trans('crud.processing')) }}",
                            "search":         "{{ _(trans('crud.search')) }}",
                            "zeroRecords":    "{{ _(trans('crud.zeroRecords')) }}",
                            "paginate": {
                                "first":      "{{ _(trans('crud.paginate.first')) }}",
                                "last":       "{{ _(trans('crud.paginate.last')) }}",
                                "next":       "{{ _(trans('crud.paginate.next')) }}",
                                "previous":   "{{ _(trans('crud.paginate.previous')) }}"
                            },
                            "aria": {
                                "sortAscending":  "{{ _(trans('crud.aria.sortAscending')) }}",
                                "sortDescending": "{{ _(trans('crud.aria.sortDescending')) }}"
                            }
                        },
                        "sDom": "<'table-responsive't><'row'<p i>>",
                        "destroy": true,
                        "responsive": true,
                        "scrollCollapse": true
                    });
            @endif

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


                    swal({  title: "<?php echo _(Lang::get('crud.delete_confirm')) ?>",
                            text: "<?php echo _(Lang::get('crud.delete_info')) ?>",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "<?php echo _(trans('crud.delete_confirm_yes_delete')) ?>",
                            cancelButtonText: "{{ _(trans('crud.delete_cancel')) }}",
                            closeOnConfirm: true
                        }, function(isConfirm){
                            if (isConfirm) {

                                $.ajax({
                                    url: delete_url,
                                    beforeSend: function (request){
                                        request.setRequestHeader("X-CSRF-TOKEN", $('[name="_token"]').val());
                                    },
                                    type: 'DELETE',
                                    success: function(result) {
                                        // Show an alert with the result
                                        new PNotify({
                                            title: "{{ _(trans('crud.delete_confirmation_title')) }}",
                                            text: "{{ _(trans('crud.delete_confirmation_message')) }}",
                                            type: "success"
                                        });
                                        // delete the row from the table
                                        delete_button.parentsUntil('tr').parent().remove();
                                    },
                                    error: function(result) {
                                        // Show an alert with the result
                                        new PNotify({
                                            title: "{{ _(trans('crud.delete_confirmation_not_title')) }}",
                                            text: "{{ _(trans('crud.delete_confirmation_not_message')) }}",
                                            type: "warning"
                                        });
                                    }
                                });

                            } else {

                                new PNotify({
                                    title: "{{ _(trans('crud.delete_confirmation_not_deleted_title')) }}",
                                    text: "{{ _(trans('crud.delete_confirmation_not_deleted_message')) }}",
                                    type: "info"
                                });

                            }
                        });


                });
            }


        });
    </script>
@endsection
