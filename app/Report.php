<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = [
        'title',
        'contents',
        'user_id',
        'reporting_time'
    ];

    public function getAll($id)
    {
        return $this->where('user_id', $id)->get();
    }
}
