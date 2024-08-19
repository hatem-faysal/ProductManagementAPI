<?php
namespace App\Http\Resources\Api\V1\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OnlyUserResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->getRoleNames()??'',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
