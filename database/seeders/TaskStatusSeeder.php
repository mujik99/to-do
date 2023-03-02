<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatusModel;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $statuses = ['Open', 'Done'];

        foreach ($statuses as $status) {
            $model = new TaskStatusModel();
            $model->title = $status;
            $model->save();
        }

    }
}
