<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Users;
class UserSeeder extends Seeder
{
    public function run()
    {
         // Helper to generate random values
         helper('text');
       
        for($num=0;$num<5;$num++){
            $user = new Users();

        $insertdata['first_name'] = random_string('alpha');
        $insertdata['last_name'] = random_string('alpha');
        $insertdata['address'] = random_string('alpha');
        $user->insert($insertdata);
        }
     
    }
}
