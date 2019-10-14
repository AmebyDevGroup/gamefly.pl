<?php

use App\Models\Backend\User;
use Illuminate\Database\Migrations\Migration;

class AddAdminAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $kw = User::firstOrCreate([
            'name' => 'Krzysztof Wieczorek',
            'email' => 'krzysiu_1996@o2.pl',
            'password' => '$2y$10$A5i2qGp0pZLIsSKHizpdlebeD5X5G3JKz76/ZbtDZCgqTJbq4CnHq'

        ]);
        $jw = User::firstOrCreate([
            'name' => 'Jakub Werwiński',
            'email' => 'werwa999@gmail.com',
            'password' => '$2y$10$/7KFB4vR8Kq7baRWeIT3eOQRbj8dGRcEDCfh.whocYGn.CS35iBhm'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
