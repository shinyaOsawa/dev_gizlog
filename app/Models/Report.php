<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'contents',
        'user_id',
        'reporting_time'
    ];

    /**
     * 日付を変形する属性
     *
     * @var array
     */

    protected $dates = [
        'reporting_time'
    ];

    public function fetchReportByUserid($id)
    {
        return $this->where('user_id', $id)->orderBy('reporting_time', 'desc')->get();
    }

    public function fetchReportByUseridAndMonth($id, $month)
    {
        return $this->where('user_id', $id)
                    ->where('reporting_time', 'LIKE', "{$month}%")
                    ->orderBy('reporting_time', 'desc')
                    ->get();
    }
}
