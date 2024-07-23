<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies_name = [
            "UniPharma", "Avenzor Pharmaceuticals", "Human Pharma",
            "Barakat Pharmaceuticals", "ElSaad Pharmaceuticals",
            "Bahri Pharmaceuticals", "Ultra Medica", "Diamond Pharma"
        ];
        $index = 0;
        $companies = Company::factory(8)->hasAddress(1)->create();
        foreach ($companies as $company) {
            $company->addMedia("public\medistCompanies\\" . $companies_name[$index] . '.jpg')->preservingOriginal()->toMediaCollection('companies');
            $company->address->name = $companies_name[$index++];
            $company->address->save();
        }
    }
}
