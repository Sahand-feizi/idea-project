<?php

use App\Models\User;

it('registes user', function () {
    visit('/register')
        ->fill('name', 'Sahand Feizi')
        ->fill('email', 'sahand@gmail.com')
        ->fill('password', 'password')
        ->press('@register-btn')
        ->assertRoute('idea.index');

    expect(User::count())->toBe(1);

    $this->assertAuthenticated();
});

it('checks form validation errors', function () {
    $email = 'sahand@gmail.com';

    User::create([
        'name' => 'sahand',
        'email' => $email,
        'password' => 'password',
    ]);

    visit('/register')
        ->press('@register-btn')
        ->assertPathIs('/register')
        ->assertSee('The name field is required.')
        ->assertSee('The email field is required.')
        ->assertSee('The password field is required.')
        ->fill('name', 'sah')
        ->fill('password', 'pas')
        ->press('@register-btn')
        ->assertSee('The name field must be at least 5 characters.')
        ->assertSee('The password field must be at least 8 characters.')
        ->fill('name', 'sahand feizi')
        ->fill('email', $email)
        ->fill('password', 'password')
        ->press('@register-btn')
        ->assertSee('The email has already been taken.');

    expect(User::count())->toBe(1);
});
