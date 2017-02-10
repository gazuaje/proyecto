<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departamento.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:02:26pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Departamento extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    public $timestamps = false;
    
    protected $table = 'departamentos';

	
}
