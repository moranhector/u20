<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detalles';

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
                  'descrip',
                  'id_factura',
                  'id_articulo',
                  'cantidad',
                  'precio',
                  'importe',
                  'iva',
                  'gravado',
                  'alicuota'
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
    



}
