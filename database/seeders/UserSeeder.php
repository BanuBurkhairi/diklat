<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => '340017897',
            'name' => 'Muhammad Ervin Sugiar SST, M.Si.',
            'password' => bcrypt('340017897'),
            'profile_photo' => '/img/profil/340017897.jpg',
        ]);
        User::create([
            'id' => '340057217',
            'name' => 'Syukur Rahmat Putra Selamat Zai, SST',
            'password' => bcrypt('340057217'),
            'profile_photo' => '/img/profil/340057217.jpg',
        ]);
        User::create([
            'id' => '340014034',
            'name' => 'Totona Buulolo, S.E.',
            'password' => bcrypt('340014034'),
            'profile_photo' => '/img/profil/340014034.jpg',
        ]);
        User::create([
            'id' => '340016376',
            'name' => 'Motani Zebua, S.E.',
            'password' => bcrypt('340016376'),
            'profile_photo' => '/img/profil/340016376.jpg',    
        ]);
        User::create([
            'id' => '340016375',
            'name' => 'Asran Lase, S.E.',
            'password' => bcrypt('340016375'),
            'profile_photo' => '/img/profil/340016375.jpg',
        ]);
        User::create([
            'id' => '340054518',
            'name' => 'Herman Syukur Zebua, S.E.',
            'password' => bcrypt('340054518'),
            'profile_photo' => '/img/profil/340054518.jpg',
        ]);
        User::create([
            'id' => '340054520',
            'name' => 'Idaman Jaya Zendrato, S.E.',
            'password' => bcrypt('340054520'),
            'profile_photo' => '/img/profil/340054520.jpg',
        ]);
        User::create([
            'id' => '340057165',
            'name' => 'Nonifili Febrianty Harefa, SST, M.SM.',
            'password' => bcrypt('340057165'),
            'profile_photo' => '/img/profil/340057165.jpg',
        ]);
        User::create([
            'id' => '340057445',
            'name' => 'Jurdkriswanti Lase, SST',
            'password' => bcrypt('340057445'),
            'profile_photo' => '/img/profil/340057445.jpg',
        ]);
        User::create([
            'id' => '340057574',
            'name' => 'Rosmeyanna Daeli, SST',
            'password' => bcrypt('340057574'),
            'profile_photo' => '/img/profil/340057574.jpg',
        ]);
        User::create([
            'id' => '340058186',
            'name' => 'Claudia Damaris Br Kaban, SST',
            'password' => bcrypt('340058186'),
            'profile_photo' => '/img/profil/340058186.jpg',
        ]);
        User::create([
            'id' => '340059736',
            'name' => 'Rica Purnama Sari Saragi, S.Tr.Stat.',
            'password' => bcrypt('340059736'),
            'profile_photo' => '/img/profil/340059736.jpg',
        ]);
        User::create([
            'id' => '340060555',
            'name' => 'Banu Burkhairi, S.Tr.Stat.',
            'password' => bcrypt('340060555'),
            'profile_photo' => '/img/profil/340060555.jpg',
        ]);
        User::create([
            'id' => '340061087',
            'name' => 'Fitria Cahyaningtyas, A.Md.Kb.N',
            'password' => bcrypt('340061087'),
            'profile_photo' => '/img/profil/340061087.jpg',
        ]);
        User::create([
            'id' => '340061798',
            'name' => 'Fitri Noor Hikmah, S.Tr.Stat.',
            'password' => bcrypt('340061798'),
            'profile_photo' => '/img/profil/340061798.jpg',
        ]);
        User::create([
            'id' => '340062043',
            'name' => 'Ruti Tryana Telaumbanua, S.Tr.Stat.',
            'password' => bcrypt('340062043'),
            'profile_photo' => '/img/profil/340062043.jpg',
        ]);
        User::create([
            'id' => '340062225',
            'name' => 'Rekha Novalina, A.Md.Stat.',
            'password' => bcrypt('340062225'),
            'profile_photo' => '/img/profil/340062225.jpg',
        ]);
        User::create([
            'id' => '340062379',
            'name' => 'Bill Van Ricardo Zalukhu, S.Tr.Stat.',
            'password' => bcrypt('340062379'),
            'profile_photo' => '/img/profil/340062379.jpg',
        ]);
    }
}
