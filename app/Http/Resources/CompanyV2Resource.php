<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CompanyV2Resource extends JsonResource
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
            'name' => $this->address->name,
            'image' => $compare . Str::after($this->getFirstMediaUrl('companies'),$compare),
        ];
    }
}
