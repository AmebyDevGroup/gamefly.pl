<?php

use App\Pegi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PegiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegi = [
            'Pegi3' => 3,
            'Pegi7' => 7,
            'Pegi12' => 12,
            'Pegi16' => 16,
            'Pegi18' => 18
        ];
        foreach ($pegi as $item => $age) {
            $created = Pegi::create([
                'name' => $item,
                'slug' => Str::slug($item),
                'age' => $age
            ]);
            $created->addMedia(public_path('img/pegi/' . Str::slug($item) . '.png'))->preservingOriginal()->toMediaCollection('image');
        }
    }
}
