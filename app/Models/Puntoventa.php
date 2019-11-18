<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puntoventa extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'puntoventas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'nombre',
                  'numero',
                  'sistema',
                  'domicilio',
                  'fechadesde',
                  'habilitado'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    

    /**
     * Set the fechadesde.
     *
     * @param  string  $value
     * @return void
     */
    public function setFechadesdeAttribute($value)
    {
        $this->attributes['fechadesde'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get fechadesde in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getFechadesdeAttribute($value)
    {
        //dd($value);
        return $value;
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
