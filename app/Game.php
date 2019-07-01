<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        "name",
        "year",
        "category_id",
        "company_id",
    ];
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function platforms() {
        return $this->belongsToMany('App\Platform');
    }
}
