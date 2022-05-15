<?php

namespace App\Modules\Temperatures\Services;

use App\Exceptions\BaseException;
use App\Modules\Temperatures\Repositories\TemperatureRepository;
use App\Modules\Temperatures\Transformers\TemperatureTransformer;

class TemperatureService
{
    use TemperatureTransformer;
    protected $repo;

    public function __construct(TemperatureRepository $tempRepo)
    {
        $this->repo = $tempRepo;
    }

    public function getLocationTemperature($lat, $lon)
    {
        try {
            $allTemperatures = $this->repo->getLocationTemperature($lat, $lon);
            return $allTemperatures;

          
        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1008, $exc->getMessage());
        }
    }

    public function storeTemperature($locationTemperature, $temp_id)
    {
        try {
            return $this->repo->storeTemperature($locationTemperature, $temp_id);
        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1009, $exc->getMessage());
        }
    }

    public function getUserLogTempDetails()
    {
        try {
            $allTemperatures = $this->repo->getUserLogTempDetails();
              $returningTemperatures = [];
            if(count($allTemperatures) > 0){
                foreach ($allTemperatures as $temperature) {
                    $returningTemperatures[] = $this->transformTemperature($temperature);
                }
            }
            return $returningTemperatures;
        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1009, $exc->getMessage());
        }
    }

     public function getTempDetailsByHottest()
    {
        try {
            return $this->repo->getTempDetailsByHottest();
        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1009, $exc->getMessage());
        }
    }



    // public function getUserLogTempDetails()
    // {
    //     try {
    //         return $this->repo->getUserLogTempDetails();
    //     } catch (BaseException $exc) {
    //         throw $exc;
    //     } catch (\Exception $exc) {
    //         throw new BaseException(1009, $exc->getMessage());
    //     }
    // }



}