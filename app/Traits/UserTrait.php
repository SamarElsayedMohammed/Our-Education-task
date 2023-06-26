<?php
namespace App\Traits;

use Carbon\Carbon;

trait UserTrait
{

    public function convertTime($time)
    {
        return Carbon::createFromFormat('m/d/Y', $time)->format('Y-m-d');
    }
}