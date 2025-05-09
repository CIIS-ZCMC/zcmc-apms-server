<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ObjectiveDuplicateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "objective_uuid" => $this->objective_uuid,
            "code" => $this->code,
            "description" => $this->description,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
