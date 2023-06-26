<?php

namespace App\Traits;

trait GeneralTrait
{
    public function jsondata($data)
    {
        return json_decode(file_get_contents($data), true);
    }
}