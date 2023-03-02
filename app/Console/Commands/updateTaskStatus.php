<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TaskModel;
use Carbon\Carbon;

class updateTaskStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateTaskStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change status task older than 5 minutes to done';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        TaskModel::all()->each(function ($item) use($now) {
            $end = Carbon::parse($item->created_at);
            $minuteDiff = $now->diff($end)->format('%I');
            if ($minuteDiff > 5 && $item->status != 2) {
                $model = TaskModel::find($item->id);
                $model->status = 2;
                $model->save();
            }
        });

    }
}
