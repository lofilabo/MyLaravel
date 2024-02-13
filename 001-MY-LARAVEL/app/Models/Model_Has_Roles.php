<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Model_Has_Roles extends Model
{
  public $table = 'model_has_roles';




  public $fillable = [
      'model_id',
      'role_id',
      'model_type'

  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
      'id' => 'integer',
      'model_id' => 'string',
      'role_id' => 'string',
      'model_type' => 'string',
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [

  ];

  public $timestamps = false;
}
