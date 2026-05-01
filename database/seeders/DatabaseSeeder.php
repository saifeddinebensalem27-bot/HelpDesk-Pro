<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Ticket;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Users
        $admin = User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@helpdesk.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        $agent1 = User::create([
            'name'     => 'Agent One',
            'email'    => 'agent1@helpdesk.com',
            'password' => Hash::make('password'),
            'role'     => 'agent',
        ]);

        $agent2 = User::create([
            'name'     => 'Agent Two',
            'email'    => 'agent2@helpdesk.com',
            'password' => Hash::make('password'),
            'role'     => 'agent',
        ]);

        $user1 = User::create([
            'name'     => 'John Doe',
            'email'    => 'john@helpdesk.com',
            'password' => Hash::make('password'),
            'role'     => 'user',
        ]);

        $user2 = User::create([
            'name'     => 'Jane Smith',
            'email'    => 'jane@helpdesk.com',
            'password' => Hash::make('password'),
            'role'     => 'user',
        ]);

        $user3 = User::create([
            'name'     => 'Bob Wilson',
            'email'    => 'bob@helpdesk.com',
            'password' => Hash::make('password'),
            'role'     => 'user',
        ]);

        // Categories
        $network  = Category::create(['name' => 'Network']);
        $hardware = Category::create(['name' => 'Hardware']);
        $software = Category::create(['name' => 'Software']);

        // Tickets
        Ticket::create([
            'title'       => 'Cannot connect to WiFi',
            'description' => 'My laptop cannot connect to the office WiFi since this morning.',
            'status'      => 'open',
            'priority'    => 'high',
            'category_id' => $network->id,
            'user_id'     => $user1->id,
            'assigned_to' => $agent1->id,
        ]);

        Ticket::create([
            'title'       => 'Monitor not displaying',
            'description' => 'My monitor turns on but shows a black screen.',
            'status'      => 'in_progress',
            'priority'    => 'critical',
            'category_id' => $hardware->id,
            'user_id'     => $user2->id,
            'assigned_to' => $agent2->id,
        ]);

        Ticket::create([
            'title'       => 'Excel keeps crashing',
            'description' => 'Microsoft Excel crashes every time I open a large file.',
            'status'      => 'in_progress',
            'priority'    => 'medium',
            'category_id' => $software->id,
            'user_id'     => $user3->id,
            'assigned_to' => $agent1->id,
        ]);

        Ticket::create([
            'title'       => 'Printer offline',
            'description' => 'The printer on the second floor shows offline status.',
            'status'      => 'resolved',
            'priority'    => 'low',
            'category_id' => $hardware->id,
            'user_id'     => $user1->id,
            'assigned_to' => null,
        ]);

        Ticket::create([
            'title'       => 'VPN not working',
            'description' => 'Cannot connect to company VPN from home.',
            'status'      => 'closed',
            'priority'    => 'high',
            'category_id' => $network->id,
            'user_id'     => $user2->id,
            'assigned_to' => $agent2->id,
        ]);
    }
}