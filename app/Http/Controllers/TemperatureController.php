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

    /**
     *  display a  list of the users login temperatures.
     *
     */
    public function index(Request $request)
    {
        try {

            $temperatures1 = $this->temperatureService->getUserLogTempDetails();
            $temperatures2 = $temperatures1;

            return Inertia::render('Dashboard', [
                'temperatures1' => $temperatures1,
                'temperatures2' => $temperatures2,
                'city1' => "Colombo",
                'city2' => "Melbourne",
            ]);

        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1013, $exc->getMessage());
        }
    }

    /**
     *  display a  list of hottest temperatures.
     *
     */
    public function hottestFirst(Request $request)
    {

        try {

            $temperatures1 = $this->temperatureService->getTemp1DetailsByHottest();
            $temperatures2 = $this->temperatureService->getTemp2DetailsByHottest();
            return Inertia::render('Dashboard', [
                'temperatures1' => $temperatures1,
                'temperatures2' => $temperatures2,
                'city1' => "Colombo",
                'city2' => "Melbourne",
            ]);

        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1013, $exc->getMessage());
        }

    }

    /**
     *  Reset temperature Order.
     *
     */
    public function resetOrder(Request $request)
    {

        try {

            $temperatures1 = $this->temperatureService->getUserLogTempDetails();
            $temperatures2 = $temperatures1;

            return Inertia::render('Dashboard', [
                'temperatures1' => $temperatures1,
                'temperatures2' => $temperatures2,
                'city1' => "Colombo",
                'city2' => "Melbourne",

            ]);

        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1013, $exc->getMessage());
        }

    }

}