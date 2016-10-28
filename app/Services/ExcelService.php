<?php
/**
 * Created by PhpStorm.
 * User: angela
 * Date: 2016/10/25
 * Time: 17:04
 */
namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;

class ExcelService
{
    public static function download($cellData)
    {
        Excel::create('学生成绩',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

}