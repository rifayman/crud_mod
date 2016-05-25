<?php

namespace __storagePath____Singular__\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Infinety\CRUD\Http\Controllers\CrudController;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation
//use starter\Admin\Historia\Requests\AboutUsRequest as StoreRequest;
//use starter\Admin\Historia\Requests\AboutUsUpdateRequest as UpdateRequest;

class __Singular__CrudController extends CrudController {
    public $crud = array(
        
        // what's the namespace for your entity's model
        "model" => "\__storagePath____Singular__\Models\__Singular__",
        
        // what name will show up on the buttons, in singural (ex: Add entity)
        "entity_name" => "__Singular__",
        
        // what name will show up on the buttons, in plural (ex: Delete 5 entities)
        "entity_name_plural" => "__Plural__",
        
        // what route have you defined for your entity? used for links.
        "route" => "__dashBoardPath__/__singular__",
        
        "details_row" => false,
        
        "ajax_load" => true,

        "is_translate" => __translatable__,
        
        "model_translate" => "\__storagePath____Singular__\Models\__Singular__Translation",

        // *****
        // COLUMNS
        // *****
        //
        // Define the columns for the table view as an array:
        //
        
        __columns__
		
        // *****
        // FIELDS
        // *****
        //
        // Define the fields for the "Edit item" and "Add item" views as an array:
        //

        __fields__

    );



    public function store(Request $request)
    {
        return parent::storeCrud();
    }
    public function update(Request $request)
    {
        return parent::updateCrud();
    }

}