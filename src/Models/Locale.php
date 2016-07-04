<?php

namespace Infinety\CRUD\Models;

use Illuminate\Database\Eloquent\Model;
use Infinety\CRUD\CrudTrait;

class Locale extends Model
{
    use CrudTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locale';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['language', 'iso', 'state'];

    /**
     * Return Availables locales.
     *
     * @return mixed
     */
    public function getAvailables()
    {
        return $this->where('state', 1)->get();
    }
}
