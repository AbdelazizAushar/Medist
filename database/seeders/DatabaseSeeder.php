<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Company;
use App\Models\Medicine;
use App\Models\MedicineDetails;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(WarehouseSeeder::class); // creates warehouses
        $this->call(CompanySeeder::class); // creates companies
        $this->call(CategorySeeder::class); // creates categories
        $this->call(MedicineDetailsSeeder::class); // creates medicines doses
        $this->call(MedicineSeeder::class); // creates medicines
        $warehouse = Warehouse::first();
        $medicines = Medicine::all();
        $companiesAll = Company::all();
        $warehouse->companies()->saveMany($companiesAll);
        foreach($medicines as $medicine) {
            $companies = Company::inRandomOrder()->limit(1)->get();
            $medicine->company()->associate($companies[0]);
            $medicine->warehouse()->associate($warehouse);
            $medicine->save();
        }
        $doses = MedicineDetails::all();
        foreach($doses as $dose) {
            if($dose->medicine_id == 0) {
                $dose->delete();
                continue;
            }
            $dose->quantity()->create([
                'sold' => 0,
                'available' => rand(10,1000),
                'warehouse_id' => $dose->medicine->warehouse_id
            ]);
        }
    }
}
