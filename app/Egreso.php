<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Egreso.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:04:06pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Egreso extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    public $timestamps = false;
    
    protected $table = 'egresos';

	
	public function articulo()
	{
		return $this->belongsTo('App\Articulo','articulo_id');
	}

	
	public function departamento()
	{
		return $this->belongsTo('App\Departamento','departamento_id');
	}

	
}
