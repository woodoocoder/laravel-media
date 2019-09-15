<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MediaCollections extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $tablePrefix = config('woodoocoder.media.table_prefix');
        $collectionName = config('woodoocoder.media.default_collection_name');


        Schema::create($tablePrefix.'collection_types', function (Blueprint $table) use ($tablePrefix) {
            $table->increments('id');
            $table->string('name', 10);
            $table->timestamps();
        });

        \DB::table($tablePrefix.'collection_types')->insert([
            ['name' => 'public'],
            ['name' => 'private'],
        ]);

        Schema::create($tablePrefix.'collections', function (Blueprint $table) use ($tablePrefix, $collectionName) {
            $table->bigIncrements('id');
            $table->integer('type_id')->default(1)->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('name', 255)->default($collectionName);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            
            $table->foreign('type_id')->references('id')->on($tablePrefix.'collection_types')
                ->onDelete('cascade');
        });

        Schema::create($tablePrefix.'allow_users', function (Blueprint $table) use ($tablePrefix) {
            $table->bigIncrements('id');
            $table->bigInteger('collection_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            
            $table->foreign('collection_id')->references('id')->on($tablePrefix.'collections')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $tablePrefix = config('woodoocoder.media.table_prefix');

        Schema::table($tablePrefix.'allow_users', function (Blueprint $table) {
            $table->dropIndex(['collection_id', 'user_id']);

            $table->dropForeign(['user_id']);
            $table->dropForeign(['collection_id']);
        });
        Schema::dropIfExists($tablePrefix.'allow_users');

        Schema::table($tablePrefix.'collections', function (Blueprint $table) {
            $table->dropIndex(['user_id']);

            $table->dropForeign(['user_id']);
            $table->dropForeign(['type_id']);
        });
        Schema::dropIfExists($tablePrefix.'collections');

        Schema::dropIfExists($tablePrefix.'collection_types');
    }
}
