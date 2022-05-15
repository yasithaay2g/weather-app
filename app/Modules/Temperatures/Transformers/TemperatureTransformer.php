<?php

namespace  App\Modules\Temperatures\Transformers;

use App\Models\User;
use App\Modules\Temperatures\Models\Temperature;

trait TemperatureTransformer
{
    public function transformTemperature($temperature)
    {
        $split=explode("T",$temperature['created_at']);
        $temperature['created_at']=date("D d M Y, h:m A",strtotime($split[0].' '.explode(".",$split[1])[0]));
        return $temperature;
    }

 
}