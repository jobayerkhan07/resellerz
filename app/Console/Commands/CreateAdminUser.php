<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdminUser extends Command
{
    protected $signature = 'create:admin';
    protected $description = 'Create a new Admin user';

    public function handle(): int
    {
        $name = $this->ask('Enter Admin Name');
        $email = $this->ask('Enter Admin Email');
        $password = $this->secret('Enter Admin Password');

        $admin = User::create([
            'name' => $name,
            'email' => $email,
            'reference_id' => 'AD-' . Str::random(8),
            'password' => Hash::make($password),
        ]);

        $admin->assignRole('Admin');
        $admin->status = 'active';
        $this->info('Admin user created successfully!');

        return Command::SUCCESS;
    }

}
