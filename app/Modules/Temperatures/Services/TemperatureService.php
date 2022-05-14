<?php

namespace App\Modules\Temperatures\Services;

use App\Exceptions\BaseException;
use App\Modules\Temperatures\Repositories\TemperatureRepository;

class TemperatureService
{
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

            // $returningArticles = [];
            // if(count($allTemperatures) > 0){
            //     foreach ($allTemperatures as $article) {
            //         $returningTemperatures[] = $this->transformTemperature($article);
            //     }
            // }
            // return $returningTemperatures;
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
            return $this->repo->getUserLogTempDetails();
        } catch (BaseException $exc) {
            throw $exc;
        } catch (\Exception $exc) {
            throw new BaseException(1009, $exc->getMessage());
        }
    }



}