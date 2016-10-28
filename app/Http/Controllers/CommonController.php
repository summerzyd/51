<?php
/**
 * Created by PhpStorm.
 * User: angela
 * Date: 2016/10/28
 * Time: 16:31
 */
namespace App\Http\Controllers;

use App\Components\JpGraph;
use App\Http\Controllers;
use App\Services\ExcelService;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function lineChart()
    {
        JpGraph::lineChart();
    }
}