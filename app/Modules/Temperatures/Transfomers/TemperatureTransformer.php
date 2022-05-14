<?php

namespace  App\Modules\Temperatures\Transformers;

use App\Models\User;
use App\Modules\Temperatures\Models\Temperature;

trait TemperatureTransformer
{
    public function transformTemperature(Temperature $temperature)
    {
        return [
            'id'      => (int) $temperature->id,
            'title'   => $temperature->title,
            'content' => $temperature->content,
            'status'  => (object) [
                'status_value' => $temperature->status
            ],
            'author'  => (object) $this->Temperature($temperature->temperatureAuthor)
        ];
    }

    public function transformAuthor(User $user)
    {
        return [
            'id'      => (int) $user->id,
            'name'   => $user->name,
            'email' => $user->email
        ];
    }
}
