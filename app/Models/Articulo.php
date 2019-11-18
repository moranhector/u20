<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articulos';

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
                  'ean13',
                  'id_rubro',
                  'umedida',
                  'precio',
                  'codigo',    // Codigo alfanumerico libre
                  'costo',     // Costo Pesos
                  'costod',    // Costo Dolar
                  'proveedor', // Id Proveedor Principal
                  'codigoprov' // Codigo interno del Proveedor del articulo
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
