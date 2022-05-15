<?php

namespace App\Modules\Temperatures\Repositories;

use App\Exceptions\BaseException;
use App\Modules\Temperatures\Models\Temperature;
use Illuminate\Support\Facades\Auth;

class TemperatureRepository
{
    protected $model;

    public function __construct(Temperature $temperature)
    {
        $this->model = $temperature;
    }

    //when user login save data
    public function getTempDetailsByAPI()
    {
        try {
            //Colombo
            $lat1 = 6.92;
            $lon1 = 79.86;
            $location1Temperature = $this->getLocationTemperature($lat1, $lon1);

            //Melbourne
            $lat2 = -37.77;
            $lon2 = 145.05;
            $location2Temperature = $this->getLocationTemperature($lat2, $lon2);

            $temp_id = $this->storeTemperature($location1Temperature, 0);
            $this->storeTemperature($location2Temperature, $temp_id);

        } catch (\Exception $exc) {

            throw new BaseException(1002);
        }
    }

    public function getLocationTemperature($lat, $lon)
    {
        try {
            $exclude = "minutely";
            $appid = "8dc9ba99c4e5fe28f4dc20edbc1848c0";
            $url = 'https://api.openweathermap.org/data/2.5/onecall?lat=' . $lat . '&lon=' . $lon . '&exclude=' . $exclude . '&appid=' . $appid;
            $response = file_get_contents($url);
            return json_decode($response);

        } catch (\Exception $exc) {
            throw new BaseException(1001);
        }
    }

    public function storeTemperature($locationTemperature, $temp_id)
    {

        try {
            if ($temp_id == 0) {
                $tempData = [];
                $ce = ($locationTemperature->current->temp) - 273;
                $fah = $this->convertFahrenheit($ce);
                $tempData['user_id'] = Auth::user()->id;
                $tempData['city1_name'] = $locationTemperature->timezone;
                $tempData['city1_temp_f'] = round($fah, 2);
                $tempData['city1_temp_c'] = round($ce, 2);
                $temp = $this->model->create($tempData);

                return $temp->id;
            } else {
                $tempData = [];
                $ce = ($locationTemperature->current->temp) - 273;
                $fah = $this->convertFahrenheit($ce);
                $temp = $this->model->where('id', $temp_id)->update([
                    'city2_name' => $locationTemperature->timezone,
                    'city2_temp_f' => round($fah, 2),
                    'city2_temp_c' => round($ce, 2),
                ]);
                return true;
            }

        } catch (\Exception $exc) {

            throw new BaseException(1002);
        }
    }

    public function convertFahrenheit($ce)
    {
        try {
            return ($ce * 9 / 5) + 32;
        } catch (\Exception $exc) {
            throw new BaseException(1002);
        }
    }

    public function getUserLogTempDetails()
    {
        try {
            return $this->model->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get()->toArray();
        } catch (\Exception $exc) {
            throw new BaseException(1002);
        }
    }

    public function getTemp1DetailsByHottest()
    {
        try {
            return $this->model->where('user_id', Auth::user()->id)->orderBy('city1_temp_c', 'DESC')->select('city1_temp_c','city1_temp_c','created_at')->get()->toArray();
        } catch (\Exception $exc) {
            throw new BaseException(1002);
        }
    }


    public function getTemp2DetailsByHottest()
    {
        try {
            return $this->model->where('user_id', Auth::user()->id)->orderBy('city2_temp_c', 'DESC')->select('city2_temp_c','city2_temp_c','created_at')->get()->toArray();
        } catch (\Exception $exc) {
            throw new BaseException(1002);
        }
    }
}  