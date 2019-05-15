<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateItemTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('items', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('list_id');
                $table->text('detail');
                $table->timestamp('deadline')->nullable();
                $table->tinyInteger('status')->default(0);
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
            Schema::dropIfExists('item');
        }
    }
