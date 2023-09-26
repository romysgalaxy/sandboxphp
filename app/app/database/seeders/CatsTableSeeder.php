<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cats')->insert([
            [
                'name' => 'Omega',
                'picture' => 'images/cats/UfV6t0lByhRViLijgodYtWgRzoOfUbhenH91RKU8.jpg',
                'breed' => 'Chartreux',
                'age' => 9,
                'ability' => 'Peut dormir 27 heures par jour',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alpha',
                'picture' => 'images/cats/aBdKa3SXDWLlVdlJJjEY4mPrYP750KejoV4XR0Ti.jpg',
                'breed' => 'Bengal',
                'age' => 4,
                'ability' => 'Peut remplacer un réveil pour le matin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beta',
                'picture' => 'images/cats/kGYgntYbBiOaBCtwpBdxN3H1YS5L9pEJIFz2b2Nl.webp',
                'breed' => 'Siamois',
                'age' => 12,
                'ability' => 'Possède un trou noir à la place de l\'estomac',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Delta',
                'picture' => 'images/cats/e5G3atvHScT64r3r9FoTUz221YMi8Ae3mnrzgKDL.jpg',
                'breed' => 'Main coon',
                'age' => 2,
                'ability' => 'Prend plus d\'espace qu\'un humain dans un lit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sigma',
                'picture' => 'images/cats/HMaU4cRJBvMhYn6SLSbb4FCN8trtSaoEKtnteOyU.jpg',
                'breed' => 'Sphinx',
                'age' => 5,
                'ability' => 'Met des poils sur les vêtements',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
