<?php

namespace __storagePath____Singular__\Models;

use Illuminate\Database\Eloquent\Model;

class __Singular__Translation extends Model
{
    
    protected $table = '__singular___translations';

    protected $fillable = ['locale','__plural___id', __model_translatable_fillable__ ];
    
    protected $guarded = ['_token', '_method'];

}
