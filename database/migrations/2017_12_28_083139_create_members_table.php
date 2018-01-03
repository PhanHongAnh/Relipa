<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename') -> nullable();
            $table->string('phonenumber');
            $table->string('email')->unique();
            $table->softDeletes();
            /*$table->string('skype');
            $table->string('facebook');
            $table->date('dob');
            $table->string('nativeplace', 256);
            $table->string('diachithuongtru');
            $table->integer('IC_id');
            $table->date('ngaycap');
            $table->string('noicap');
            $table->integer('role_id');
            $table->integer('msthue');
            $table->integer('soBHXH');
            $table->integer('sotaikhoan');
            $table->string('nganhang');
            $table->date('ngayvao');
            $table->date('ngayra');
            $table->integer('sohopdong');
            $table->string('nguoiphuthuoc');
            $table->string('marriged');
            $table->string('noiohientai');
            $table->integer('team_id');
            $table->integer('contract_id');
            $table->integer('sohochieu');
            $table->date('ngayhethan');*/
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
        Schema::dropIfExists('members');
    }
}
