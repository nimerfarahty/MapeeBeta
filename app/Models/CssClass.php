<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use OwenIt\Auditing\AuditingTrait;

class CssClass extends Model
{
    use Sluggable,AuditingTrait;
    public static function rules(){
      return ['title' => 'required'];
    }

    public function author(){
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function sluggable()
    {
      return ['slug' => ['source' => 'title']];
    }
}
