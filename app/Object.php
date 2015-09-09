<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    protected $guarded = [];
    protected $timestamps = false;

    public function sessions()
    {
        return $this->hasOne(App\Session::class);
    }
}
