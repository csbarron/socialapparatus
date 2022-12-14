<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('avatar_url', 2048)->nullable();
            $table->string('cover_photo')->nullable();
            $table->longText('about')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('admin')->default(false);
            $table->string('notification_preferences')->default(json_encode([
                'ef'=>1,
                'elf'=>1,
                'ecf'=>1,
                'efr'=>1,
                'efa'=>1,
                'elp'=>1,
                'ecp'=>1,
                'elc'=>1,
                'sf'=>1,
                'slf'=>1,
                'scf'=>1,
                'sfr'=>1,
                'sfa'=>1,
                'slp'=>1,
                'scp'=>1,
                'slc'=>1
            ]));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
