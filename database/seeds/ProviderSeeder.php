<?php

use Illuminate\Database\Seeder;
use App\Provider;
class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provider = factory(Provider::class, 20)->make()->toArray();
        foreach($provider as $prov) {
            Provider::create($prov);
        }
    }
}
