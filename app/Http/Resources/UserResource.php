<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'tasks_count' => $this->whenCounted('tasks'),
            'id_sum' => $this->whenAggregated('tasks', 'id', 'sum'),
            'id_min' => $this->whenAggregated('tasks', 'id', 'min'),
            'id_max' => $this->whenAggregated('tasks', 'id', 'max'),
        ];
    }

    public function withResponse(Request $request, JsonResponse|\Illuminate\Http\JsonResponse $response): void
    {
        $response->header('X-Value', 'True');
    }

    public function with(Request $request): array
    {
        return [
            'meta' => [
                'key' => 'value',
            ],
        ];
    }
}
