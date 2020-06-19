<?php

use App\District;
use App\StaticPages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('optimize:clear');

        $this->call(UserSeeder::class);
        $this->call(AssetCategorySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(RegencySeeder::class);
        $this->call(DistrictSeeder::class);

        // Run seeder only in local environment
        if (App::environment() === 'local') {
            $this->call(LocalAssetSeeder::class);
            $this->call(StaticPagesSeeder::class);
        }
    }
}
