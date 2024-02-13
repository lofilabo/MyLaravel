<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class LessonsTwoCols
 * @package App\Models
 * @version April 22, 2021, 3:19 pm UTC
 *
 * @property string $bruid
 * @property string $title
 * @property string $body
 * @property string $summary
 * @property string $exfield1
 * @property string $exfield2
 * @property string $exfield3
 * @property string $exfield4
 * @property string $extref1
 * @property string $extref2
 * @property string $extref3
 * @property string $extref4
 * @property string $extref5
 * @property string $author
 * @property string $posteddate
 * @property string $posteddatetext
 */
class LessonsTwoCols extends Model
{


    public $table = 'lessons_two_cols';
    



    public $fillable = [
        'bruid',
        'title',
        'body',
        'summary',
        'exfield1',
        'exfield2',
        'exfield3',
        'exfield4',
        'extref1',
        'extref2',
        'extref3',
        'extref4',
        'extref5',
        'author',
        'posteddate',
        'posteddatetext'
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
        'body' => 'string',
        'summary' => 'string',
        'exfield1' => 'string',
        'exfield2' => 'string',
        'exfield3' => 'string',
        'exfield4' => 'string',
        'extref1' => 'string',
        'extref2' => 'string',
        'extref3' => 'string',
        'extref4' => 'string',
        'extref5' => 'string',
        'author' => 'string',
        'posteddatetext' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
