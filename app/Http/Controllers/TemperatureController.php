<?php

namespace App\Http\Controllers;

use App\Exceptions\BaseException;
use App\Http\Controllers\Controller;
use App\Modules\Temperatures\Services\TemperatureService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TemperatureController extends Controller
{
    protected $temperatureService;

    public function __construct(TemperatureService $temperatureService)
    {
        $this->temperatureService = $temperatureService;
    }

    public function index(Request $request)
    {
        try {
            // //Colombo
            // $lat1 = 6.92;
            // $lon1 = 79.86;
            // $location1Temperature = $this->temperatureService->getLocationTemperature($lat1, $lon1);
            // //Melbourne
            // $lat2 = -37.77;
            // $lon2 = 145.05;
            // $location2Temperature = $this->temperatureService->getLocationTemperature($lat2, $lon2);
            // $temp_id = $this->temperatureService->storeTemperature($location1Temperature, 0);
            // $this->temperatureService->storeTemperature($location2Temperature, $temp_id);
            
            $temperatures=$this->temperatureService->getUserLogTempDetails();
            return Inertia::render('Dashboard', [
                'temperatures' => $temperatures
            ]);

        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1013, $exc->getMessage());
        }
    }


    public function hottestFirst(Request $request)
    {


    try {

        $temperatures=$this->temperatureService->getTempDetailsByHottest();

        return Inertia::render('Dashboards', [
            'temperatures' => $temperatures
        ]);

    } catch (BaseException $exc) {
        throw $exc;
    } catch (\Exception $exc) {
        throw new BaseException(1013, $exc->getMessage());
    }

    }

    public function resetOder(Request $request)
    {


    try {


    } catch (BaseException $exc) {
        throw $exc;
    } catch (\Exception $exc) {
        throw new BaseException(1013, $exc->getMessage());
    }

    }


}