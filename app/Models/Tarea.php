<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tarea
 * @package App\Models
 * @version October 14, 2021, 4:31 pm UTC
 *
 * @property integer $id_item
 * @property string $descripcion
 */
class Tarea extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tareas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'item',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'item'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tarea' => 'required'
    ];

    
}
