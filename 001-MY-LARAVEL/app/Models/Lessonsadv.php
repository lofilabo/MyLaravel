<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Lessonsadv
 * @package App\Models
 * @version October 6, 2021, 3:02 pm UTC
 *
 * @property string $bruid
 * @property string $title
 * @property string $summary
 * @property string $tasks
 * @property string $columns
 * @property string $columnOrder
 * @property string $extref1
 * @property string $extref2
 * @property string $extref3
 * @property string $extref4
 * @property string $extref5
 * @property string $exfield0
 * @property string $exfield1
 * @property string $exfield2
 * @property string $exfield3
 * @property string $exfield4
 * @property string $author
 */
class Lessonsadv extends Model
{


    public $table = 'lessonsadvs';
    



    public $fillable = [
        'bruid',
        'title',
        'summary',
        'tasks',
        'columns',
        'columnOrder',
        'extref1',
        'extref2',
        'extref3',
        'extref4',
        'extref5',
        'exfield0',
        'exfield1',
        'exfield2',
        'exfield3',
        'exfield4',
        'author'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bruid' => 'string',
        'title' => 'string',
        'summary' => 'string',
        'tasks' => 'string',
        'columns' => 'string',
        'columnOrder' => 'string',
        'extref1' => 'string',
        'extref2' => 'string',
        'extref3' => 'string',
        'extref4' => 'string',
        'extref5' => 'string',
        'exfield0' => 'string',
        'exfield1' => 'string',
        'exfield2' => 'string',
        'exfield3' => 'string',
        'exfield4' => 'string',
        'author' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
