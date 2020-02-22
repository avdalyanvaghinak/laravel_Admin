<?php

namespace App\Models;

use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use DatePresenter;
    protected  $table = 'posts';

    protected $fillable = ['user_id','title','sub_title','description','avatar'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
