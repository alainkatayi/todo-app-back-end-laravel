<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this -> title,
            'description' => $this -> description,
            'is_completed' => $this -> is_completed,
            'start_date' => $this -> start_date,
            'end_date' => $this -> end_date,
            'user_id' => $this -> user_id,

        ];
    }
}
