<?php

use Illuminate\Database\Seeder;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin::class)->create([
            'email' => 'fahmisrg@gmail.com'
        ]);
        factory(App\User::class)->create([
            'email' => 'dompetudin@gmail.com'
        ]);
        factory(App\Admin::class, 3)->create()->each(function ($admin) {
            factory(App\User::class, 3)->create();
        });
    }
}
