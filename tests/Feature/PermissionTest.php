<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase {
    use HandlesAuthorization;
    use RefreshDatabase;

    public function test_sales_person_can_create_permission(): void {
        //first do a migration of the users table
        $this->artisan( 'migrate' );
        $user = User::factory()->create();
        //seed the roles and permissions
        $this->artisan( 'db:seed' );
        $user->assignRole( 'sales' );
        //assert  that role exists
        $this->assertTrue( $user->hasRole( 'sales' ) );

    }

}
