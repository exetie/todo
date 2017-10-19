<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Tareque\Todo\Models\Task;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('task');
            $table->date('deadline')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        
        for($i=0; $i<=10; $i++){
            
            $fake = Faker\Factory::create();
            
            $task = array(
                'task' => $fake->text(200),
                'deadline' => $fake->date('Y-m-d')
            );
            
            Task::create($task);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
