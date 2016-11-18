<?php
/**
 * Created by PhpStorm.
 * User: angela
 * Date: 2016/10/25
 * Time: 17:04
 */
namespace App\Services;

use Symfony\Component\EventDispatcher\Tests\Service;

class StatService extends Service
{
    const SPAN_HOURS = 1;
    const SPAN_DAYS = 2;
    const SPAN_MONTH = 3;
    public static function findAffiliateZoneStat(
        $startDate,
        $endDate,
        $axis,
        $offset,
        $agencyId
    ) {

    }
}