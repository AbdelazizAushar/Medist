<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $compare = '/storage/';
        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name', $request->header('locale')),
            'image' => $compare . Str::after($this->getFirstMediaUrl('categories'),$compare),

            // 'image' => $this->getFirstMediaUrl('categories', 'card'),
        ];
    }
}
