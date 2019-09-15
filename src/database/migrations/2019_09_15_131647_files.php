<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $tablePrefix = config('woodoocoder.media.table_prefix');

        Schema::create($tablePrefix.'files', function (Blueprint $table) use ($tablePrefix) {
            $table->bigIncrements('id');
            $table->bigInteger('collection_id')->unsigned()->index();
            $table->string('disk');
            $table->string('name');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->unsignedInteger('size');
            $table->timestamps();
            $table->softDeletes();

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
        
        Schema::table($tablePrefix.'files', function (Blueprint $table) use ($tablePrefix) {
            $table->dropIndex(['collection_id']);
            $table->dropForeign(['collection_id']);
        });

        Schema::dropIfExists($tablePrefix.'files');
    }
}
