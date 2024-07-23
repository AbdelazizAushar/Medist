<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class DashboardMedicineResource extends JsonResource
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
            'commercial_name' => $this->getTranslation('commercial_name', $request->header('locale')),
            'scientific_name' => $this->getTranslation('scientific_name', $request->header('locale')),
            // 'company' => $this->company->address->name,
            'company' => [
                'name' => $this->company->address->name,
                'image' => $compare . Str::after($this->company->getFirstMediaUrl('companies'), $compare),
                'image' => $compare . Str::after($this->company->getFirstMediaUrl('companies'), $compare)
            ],
            'image' => $compare . Str::after($this->getFirstMediaUrl('medicine'), $compare)
        ];
    }
}

