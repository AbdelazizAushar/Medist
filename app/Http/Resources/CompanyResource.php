<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;


class CompanyResource extends JsonResource
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
            'info' => new AddressResource($this->address),
            'image' => $compare . Str::after($this->getFirstMediaUrl('companies'),$compare),
        ];
    }
}
