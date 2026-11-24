<?php

namespace Database\Seeders;

use App\Models\Telepules;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@posta.hu',
            'password' => 'admin123',
        ]);

        Telepules::create(['irsz' => '1011', 'nev' => 'Budapest', 'megye' => 'Budapest']);
        Telepules::create(['irsz' => '2000', 'nev' => 'Szentendre', 'megye' => 'Pest']);
        Telepules::create(['irsz' => '2100', 'nev' => 'Gödöllő', 'megye' => 'Pest']);
        Telepules::create(['irsz' => '3300', 'nev' => 'Eger', 'megye' => 'Heves']);
        Telepules::create(['irsz' => '4024', 'nev' => 'Debrecen', 'megye' => 'Hajdú-Bihar']);
        Telepules::create(['irsz' => '6720', 'nev' => 'Szeged', 'megye' => 'Csongrád-Csanád']);
        Telepules::create(['irsz' => '7621', 'nev' => 'Pécs', 'megye' => 'Baranya']);
        Telepules::create(['irsz' => '9021', 'nev' => 'Győr', 'megye' => 'Győr-Moson-Sopron']);
    }
}
