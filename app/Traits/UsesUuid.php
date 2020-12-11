<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait UsesUuid {
  public static function bootUsesUuid(){
    static::creating(function($model) {
      if(! $model->getKey()) {
        $model->{$model->getKeyName()} = (string) Str::uuid();
      }
    });
  }

  public function getIncrementing()
  {
    # code...
    return false;
  }

  public function getKeyType()
  {
    # code...
    return 'string';
  }
}
?>