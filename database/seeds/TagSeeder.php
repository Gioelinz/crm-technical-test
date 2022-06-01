<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['label' => 'Caldo', 'color' => 'danger'],
            ['label' => 'Medio', 'color' => 'warning'],
            ['label' => 'Freddo', 'color' => 'primary'],
            ['label' => 'In trattativa', 'color' => 'secondary'],
            ['label' => 'Offerta conclusa', 'color' => 'success'],
        ];

        foreach ($tags as $tag) {
            $t = new Tag();
            $t->fill($tag);
            $t->save();
        }
    }
}
