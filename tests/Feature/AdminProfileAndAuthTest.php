<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class AdminProfileAndAuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login page renders with password reset capability.
     */
    public function test_login_page_renders_with_password_reset_link(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('/admin/password-reset/request', false);
    }

    /**
     * Test password reset request page is accessible.
     */
    public function test_password_reset_request_page_renders(): void
    {
        $response = $this->get('/admin/password-reset/request');

        $response->assertStatus(200);
    }

    /**
     * Test unauthenticated guest is redirected away from profile page.
     */
    public function test_guest_is_redirected_from_profile_page(): void
    {
        $response = $this->get('/admin/profile');

        $response->assertRedirect('/admin/login');
    }

    /**
     * Test authenticated admin can access profile page.
     */
    public function test_authenticated_admin_can_access_profile_page(): void
    {
        $user = User::factory()->create([
            'email' => 'testadmin@kosanputri.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($user)->get('/admin/profile');

        $response->assertStatus(200);
        $response->assertSee('testadmin@kosanputri.com');
    }

    /**
     * Test admin can update their name and email through EditProfile component.
     */
    public function test_admin_can_update_profile_info(): void
    {
        $user = User::factory()->create([
            'name' => 'Original Admin',
            'email' => 'original@kosanputri.com',
            'password' => Hash::make('oldpassword123'),
        ]);

        $this->actingAs($user);

        Livewire::test(\App\Filament\Pages\Auth\EditProfile::class)
            ->fillForm([
                'name' => 'Updated Superadmin',
                'email' => 'updated@kosanputri.com',
                'currentPassword' => 'oldpassword123',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $user->refresh();
        $this->assertEquals('Updated Superadmin', $user->name);
        $this->assertEquals('updated@kosanputri.com', $user->email);
    }

    /**
     * Test admin can update password through EditProfile component.
     */
    public function test_admin_can_change_password(): void
    {
        $user = User::factory()->create([
            'email' => 'pwdchange@kosanputri.com',
            'password' => Hash::make('oldpassword123'),
        ]);

        $this->actingAs($user);

        Livewire::test(\App\Filament\Pages\Auth\EditProfile::class)
            ->fillForm([
                'name' => $user->name,
                'email' => $user->email,
                'currentPassword' => 'oldpassword123',
                'password' => 'newSecretPassword123',
                'passwordConfirmation' => 'newSecretPassword123',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $user->refresh();
        $this->assertTrue(Hash::check('newSecretPassword123', $user->password));
    }
}
