<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'title',
        'contents',
        'user_id',
        'reporting_time'
    ];
    
    protected $dates = ['deleted_at'];

    public function getAll($id)
    {
        return $this->where('user_id', $id)->get();
    }
}
