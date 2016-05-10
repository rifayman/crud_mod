<?php
/**
 * Created by PhpStorm.
 * User: ismaelmartinez
 * Date: 9/11/15
 * Time: 11:54
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Dick Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */
    // Create form
    'add' 				=> _('Add'),
    'back_to_all'     	=> _('Back to all '),
    'cancel'     		=> _('Cancel'),
    'add_a_new'     	=> _('Add a new '),
    // Create form - advanced options
    'after_saving' => _("After saving"),
    'go_to_the_table_view' => _("go to the table view"),
    'let_me_add_another_item' => _("let me add another item"),
    'edit_the_new_item' => _("edit the new item"),
    // Edit form
    'edit'     			=> _('Edit'),
    'save'     			=> _('Save'),
    // CRUD table view
    'all'     			=> _('All '),
    'in_the_database'   => _('in the database'),
    'list'     			=> _('List'),
    'actions'     		=> _('Actions'),
    'preview'     		=> _('Preview'),
    'delete'     		=> _('Delete'),
    // Confirmation messages and bubbles
    'delete_confirm'     						=> _('Are you sure you want to delete this item?'),
    "delete_info" => _('The item will be deleted from DB'),
    'delete_confirmation_title'     			=> _('Item Deleted'),
    'delete_confirmation_message'     			=> _('The item has been deleted successfully.'),
    'delete_confirmation_not_title'     		=> _('NOT deleted'),
    'delete_confirmation_not_message'     		=> _("There's been an error. Your item might not have been deleted."),
    'delete_confirmation_not_deleted_title'     => _('Not deleted'),
    'delete_confirmation_not_deleted_message'   => _('Nothing happened. Your item is safe.'),
    'delete_confirm_yes_delete'                 => _('Yes, delete it!'),
    'delete_cancel'                             => _('Cancel'),
    // DataTables translation
    "emptyTable" => _("No data available in table"),
    "info" => _("Showing _START_ to _END_ of _TOTAL_ entries"),
    "infoEmpty" => _("Showing 0 to 0 of 0 entries"),
    "infoFiltered" => "("._("filtered from _MAX_ total entries").")",
    "infoPostFix" => " ",
    "thousands" => ",",
    "lengthMenu" => _("_MENU_ records per page"),
    "loadingRecords" => _("Loading..."),
    "processing" => _("Processing..."),
    "search" => _("Search: "),
    "zeroRecords" => _("No matching records found"),
    "paginate" => [
        "first" => _("First"),
        "last" => _("Last"),
        "next" => _("Next"),
        "previous" => _("Previous")
    ],
    "aria" => [
        "sortAscending" => _(": activate to sort column ascending"),
        "sortDescending" => _(": activate to sort column descending")
    ],
    // global crud - errors
    "unauthorized_access" => _("Unauthorized access - you do not have the necessary permissions to see this page."),
    // global crud - success / error notification bubbles
    "insert_success" => _("The item has been added successfully."),
    "update_success" => _("The item has been modified successfully."),
    // CRUD reorder view
    'reorder'     				=> _('Reorder'),
    'reorder_text'     			=> _('Use drag&drop to reorder.'),
    'reorder_success_title'     => _('Done'),
    'reorder_success_message'   => _('Your order has been saved.'),
    'reorder_error_title'   	=> _('Error'),
    'reorder_error_message'   	=> _('Your order has not been saved.'),
    'rules_text'	=> _("<strong>Notice: </strong> Do not translate words prefixed with colon (ex: ':number_of_items'). Those will be replaced automatically with a proper value. If translated), that stops working."),
];