<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CreateResellerUser extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'create:reseller';

    /**
     * The console command description.
     */
    protected $description = 'Create a new Reseller user';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        // Ask for Reseller details
        $name = $this->ask('Enter Reseller Name');
        $email = $this->ask('Enter Reseller Email');
        $password = $this->secret('Enter Reseller Password');

        // Create the Reseller user
        $reseller = User::create([
            'name' => $name,
            'email' => $email,
            'reference_id' => 'RS-' .Str::random(8),
            'password' => Hash::make($password),
        ]);

        // Assign 'Reseller' role
        $reseller->assignRole('Reseller');
        $reseller->status = 'active';
        // Show success message
        $this->info('Reseller user created successfully!');

        return Command::SUCCESS;
    }
}
