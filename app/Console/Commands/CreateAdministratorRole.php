<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Whoops\Exception\ErrorException;

class CreateAdministratorRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:admin {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create administrator role';

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
        $user = User::whereEmail($this->argument('user'))->first();
        if ($user === null) {
            $this->error('User is not found');
            return '';
        }
        if ($this->confirm('Assign admin rights to user - ' . $user->name)) {
            $user->setAssignRoleAttribute();
            $user->save();
        }
    }
}
