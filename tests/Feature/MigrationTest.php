<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;
    //perform all migration
    public function test_all_migration(): void
    {
        
        $this->artisan('migrate');
        $this->assertDatabaseHas('migrations', ['migration' => '2014_10_12_000000_create_users_table']);
        
    }
}
