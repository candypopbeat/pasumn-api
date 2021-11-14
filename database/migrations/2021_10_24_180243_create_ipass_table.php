<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpassTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ipasses', function (Blueprint $table) {
			$table->id();
			$table->string('title')->comment("タイトル");
			$table->string('account')->nullable()->comment("ID or UserName");
			$table->string('password')->comment("パスワード");
			$table->string('mail')->nullable()->comment("メールアドレス");
			$table->string('memo')->nullable()->comment("メモ");
			$table->foreignId("user_id")->comment("ユーザーIDとカスケードUPDEL")->constrained()->onUpdate('cascade')->onDelete('cascade');
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
		Schema::dropIfExists('ipass');
	}
}
