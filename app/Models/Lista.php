<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'listas';

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
                  'idarticulo',
                  'Descripcion',
                  'rubro',
                  'precio2',
                  'precio3',
                  'precio4',
                  'precio5',
                  'costo_ult_comp',
                  'gasto',
                  'item1',
                  'item2',
                  'item3',
                  'item4',
                  'set1',
                  'set2',
                  'set3',
                  'set4',
                  'proveedor',
                  'artprov',
                  'stockable',
                  'marca',
                  'empresa',
                  'dtUltCambioPrecio',
                  'importado'
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
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
