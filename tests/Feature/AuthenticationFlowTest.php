<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_landing_page_with_authentication_links()
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Landing Page')
            ->assertSee('Login')
            ->assertSee('Register');
    }

    public function test_guest_is_redirected_to_login_from_dashboard()
    {
        $this->get('/dashboard')
            ->assertRedirect(route('login'));
    }

    public function test_user_can_register_and_password_is_hashed()
    {
        $response = $this->post(route('register'), [
            'name' => 'Activity Student',
            'email' => 'student@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertRedirect('/dashboard');

        $user = User::where('email', 'student@example.com')->firstOrFail();

        $this->assertAuthenticatedAs($user);
        $this->assertTrue(Hash::check('Password123!', $user->password));
        $this->assertNotSame('Password123!', $user->password);
    }

    public function test_user_can_login_view_dashboard_and_logout()
    {
        $user = factory(User::class)->create([
            'name' => 'Activity Student',
            'email' => 'student@example.com',
            'password' => Hash::make('Password123!'),
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Password123!',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticatedAs($user);

        $this->get('/dashboard')
            ->assertOk()
            ->assertSee('Dashboard')
            ->assertSee($user->name)
            ->assertSee('Logout');

        $this->post(route('logout'))
            ->assertRedirect('/');

        $this->assertGuest();

        $this->get('/dashboard')
            ->assertRedirect(route('login'));
    }
}
