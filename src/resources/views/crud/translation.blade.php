<?php

namespace __storagePath____Singular__\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class __Singular__Translation extends Model implements HasMediaConversions
{
	use HasMediaTrait;
    
    protected $table = '__singular___translations';

    protected $fillable = ['locale','__plural___id', __model_translatable_fillable__ ];
    
    protected $guarded = ['_token', '_method'];

    /**
     * Media conversion by default
     */
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 368, 'h' => 232])
             ->performOnCollections('*');
    }

}
