<?php
/**
 * Created by PhpStorm.
 * User: angela
 * Date: 2016/10/25
 * Time: 16:43
 */
namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Services\ExcelService;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function index()
    {
        $a = DB::table('data_hourly_daily_af as h')
            ->select(
                'h.affiliateid',
                'ad_id',
                'zone_id'
            )->first();
        print_r($a);
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        ExcelService::download($cellData);
    }
}