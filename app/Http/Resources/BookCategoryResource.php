<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookCategoryResource extends JsonResource
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
            'created_at' => (new Carbon($this->created_at))->format('Y-m-d H:i:s'), // format the date (Y-m-d H:i:s)
            'updated_at' => (new Carbon($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
