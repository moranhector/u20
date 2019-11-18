<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facturas';

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
                  'tipo',
                  'ptovta',
                  'nrocomp',
                  'cuit',
                  'imptot',
                  'impiva',
                  'fecha',
                  'cae',
                  'fecvtocae',
                  'resultado',
                  'motivo',
                  'domicilio'
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
