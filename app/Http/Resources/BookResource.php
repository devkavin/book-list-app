<?php

namespace App\Http\Resources;

use App\Models\BookCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'title' => $this->title,
            'author' => $this->author,
            'price' => $this->price,
            'stock' => $this->stock,
            'created_at' => (new Carbon($this->created_at))->format('Y-m-d H:i:s'), // format the date (Y-m-d H:i:s)
            'updated_at' => (new Carbon($this->updated_at))->format('Y-m-d H:i:s'),
            'book_category_id' => new BookCategoryResource($this->category),
        ];
    }
}
