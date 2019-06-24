<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name = "Yuda Administrator";
        $administrator->email = "administrator@larakost.test";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("larakost");
        $administrator->avatar = "saat-ini-tidak-ada-file.png";
        $administrator->phone = "082340642239";
        $administrator->address = "Mataram, Nusa Tenggara Barat";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
