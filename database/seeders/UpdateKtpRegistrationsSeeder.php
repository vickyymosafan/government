<?php

namespace Database\Seeders;

use App\Models\KtpRegistration;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateKtpRegistrationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all KTP registrations without a user_id
        $registrationsWithoutUser = KtpRegistration::whereNull('user_id')->get();
        
        if ($registrationsWithoutUser->isEmpty()) {
            $this->command->info('No KTP registrations without user_id found.');
            return;
        }
        
        // Get the first user in the system (or create one if none exists)
        $user = User::first();
        
        if (!$user) {
            $this->command->info('No users found in the system. Creating a default user...');
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }
        
        // Update all registrations without user_id to associate with the user
        foreach ($registrationsWithoutUser as $registration) {
            $registration->user_id = $user->id;
            $registration->save();
            $this->command->info("Updated KTP registration ID {$registration->id} with user_id {$user->id}");
        }
        
        $this->command->info('All KTP registrations have been updated with a user_id.');
    }
}
