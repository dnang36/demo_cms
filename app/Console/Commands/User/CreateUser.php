<?php

namespace App\Console\Commands\User;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = [
            'email' => 'admin@admin.com',
            'password' => \Hash::make('admin'),
            'name' => 'admin',
        ];
        $user = User::updateOrCreate(
            [
                'email' => $data['email'],
            ], $data
        );
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'user manage']);
        $permission->assignRole($role);
        $user->assignRole('admin');
        return Command::SUCCESS;
    }
}
