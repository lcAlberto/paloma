<?php

namespace App\Services;
//use http\Env\Request;
use App\Http\Requests\CioRequest;
use App\Models\Animal;
use App\Models\AnimalHeat;
use App\Repositories\CioRepository;
use App\Enums\AnimalHeatStatusEnum;
use Carbon\Carbon;
use DateTime;

class PredictBirthService
{

    public function birthPrediction($data)
    {
        $data = $this->dateHandling($data);
        $coverage_date = new Carbon($data['coverage_date']);
        $data['date_birth_prediction'] = $coverage_date->addDays(280)->format('Y-m-d H:m:s');
        return $data;
    }

    public function dateHandling($data)
    {
        $format = new DateTime();
        $data['occurrence_date'] = date('Y-m-d H:i:s', strtotime($data['occurrence_date']));
        $data['coverage_date'] = date('Y-m-d H:i:s', strtotime($data['coverage_date']));
        
        if (array_key_exists('date_birth', $data)) {
            $data['date_birth'] = date('Y-m-d H:i:s', strtotime($data['date_birth']));
        }

        return $data;
    }

    public function animal_id($request, $data)
    {
        $data['animal_id'] = (int)$data['animal_id'];
        return $data;
    }

    public function status($request, $data)
    {
        $status = 'pending';
        $data['status'] = $status;
        return $data;
    }

    

    /*public function partoSucesso($request, $data)
    {
        if ($data['status'] == 'success') {
            redirect()->route('animals.create');
        }
        return $data;
    }
    */

    public function statusVerification($data, $current)
    {
        if (
            $data['date_childbirth_foreseen'] == today()->format('Y-m-d H:m:s')
            && $data['status'] == 'success'
        )
            $data['date_childbirth'] = today()->format('Y-m-d H:m:s');
        else {
            $data['status'] = $current->status;
        }
        return $data;
    }

    /*
    public function date_childbirth_foreseenVerification($data)
    {
        if ($data['date_childbirth_foreseen'] == today()->format('Y-m-d H:m:s'))
            $data['date_childbirth'] = today()->format('Y-m-d H:m:s');
        return $data;
    }
    */
}
