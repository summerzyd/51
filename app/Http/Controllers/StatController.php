<?php
/**
 * Created by PhpStorm.
 * User: angela
 * Date: 2016/10/28
 * Time: 16:31
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class StatController extends Controller
{
    public  function zone(Request $request)
    {
        if (($ret = $this->validate($request, [
                'period_start' => 'required',
                'period_end' => 'required',
                'span' => 'required',
                'zone_offset' => 'required',
            ], [], $this->attributeLabels())) !== true
        ) {
            return $this->errorCode(5000, $ret);
        }
        $start = Input::get('period_start');
        $end = Input::get('period_end');
        $zoneOffset = Input::get('zone_offset');
        if (Input::get('span') == self::SPAN_MONTH) {
            $axis = StatService::AXIS_MONTH;
        } else {
            $axis = StatService::AXIS_DAYS;
        }
        if ($start == $end) {
            list($start, $end, $axis) = StatService::dateConversion($start, $end, $zoneOffset);
        }
        $statsCharts = StatService::findAffiliateZoneStat(
            $start,
            $end,
            $axis,
            $zoneOffset,
            2,
            0
        );
var_dump($start, $end, $zoneOffset);exit;

    }
    protected static function attributeLabels()
    {
        return [
            'revenue_type' => '计费类型',
            'item_num' => '统计类型',
            'period_start' => '起始时间',
            'period_end' => '结束时间',
            'span' => '数据分组类型',
            'date_type' => '数据类型',
            'zone_offset' => '时区',
        ];
    }
}

