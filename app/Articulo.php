<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Articulo.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:02:10pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Articulo extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    public $timestamps = false;
    
    protected $table = 'articulos';

	
}
