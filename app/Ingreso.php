<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ingreso.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:03:30pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Ingreso extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'ingresos';

	
	public function departamento()
	{
		return $this->belongsTo('App\Departamento','departamento_id');
	}

	
	public function articulo()
	{
		return $this->belongsTo('App\Articulo','articulo_id');
	}

	
}
