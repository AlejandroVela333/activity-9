<?php

namespace Tests\Feature;

use App\Mail\LoginAlert;
use App\Mail\WelcomeUser;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_sends_welcome_email_to_registered_address()
    {
        Mail::fake();

        $email = 'new.user@example.com';

        $this->post(route('register'), [
            'name' => 'New User',
            'email' => $email,
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ])->assertRedirect('/dashboard');

        Mail::assertSent(WelcomeUser::class, function ($mail) use ($email) {
            $mail->build();

            return $mail->hasTo($email) && $mail->subject === 'Bienvenido';
        });

        Mail::assertNotSent(LoginAlert::class);
    }

    public function test_successful_login_sends_alert_to_authenticated_address()
    {
        Mail::fake();

        $user = factory(User::class)->create([
            'email' => 'registered.user@example.com',
            'password' => Hash::make('Password123!'),
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Password123!',
        ])->assertRedirect('/dashboard');

        Mail::assertSent(LoginAlert::class, function ($mail) use ($user) {
            $mail->build();

            return $mail->hasTo($user->email)
                && $mail->subject === 'Alerta de inicio de sesión';
        });
    }
}
