<?php

use App\Models\User;

it('logs in user', function () {
    $email = 'sahand@gmail.com';
    $password = 'password';

    User::create([
        'name' => 'sahand',
        'email' => $email,
        'password' => $password,
    ]);

    visit('/login')
        ->fill('email', $email)
        ->fill('password', $password)
        ->press('@login-btn')
        ->assertRoute('idea.index');

    $this->assertAuthenticated();
});

it('checks form validation errors', function () {
    visit('/login')
        ->press('@login-btn')
        ->assertPathIs('/login')
        ->assertSee('The email field is required.')
        ->assertSee('The password field is required.');
});

it('logs out user', function () {
    $user = User::factory()->create();

    Auth::login($user);

    $this->assertAuthenticatedAs($user);

    visit('/')
        ->press('@logout-btn');

    expect(Auth::check())->toBe(false);
});
