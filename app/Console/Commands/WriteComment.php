<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UserService;

class WriteComment extends Command
{

    protected $UserService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment:write {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Write a comment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $comments = $this->ask('Type in your comments?');
        if ($this->confirm('Do you wish to continue?')) {
            //
            $request = [
                "id"=>$this->argument('userId'),
                "comments" => $comments
            ];
        $data = $this->UserService->comment($request);
        $this->info($data);
        }
        

        // call the service here
    }
}
