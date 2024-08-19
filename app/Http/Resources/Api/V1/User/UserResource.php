<?php
namespace App\Http\Resources\Api\V1\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = User::where('email',$request->email)->first();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'createToken' => $user->createToken('auth_token')->plainTextToken,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
