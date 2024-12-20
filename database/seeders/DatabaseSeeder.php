<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CommunityLink;
use App\Models\Channel;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Channel::factory(3)->create();
        DB::delete('delete from community_links');
        CommunityLink::factory(50)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
