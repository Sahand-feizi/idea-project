<?php

use App\Models\User;

it('requires authentication', function () {
    $this->delete('/profile')->assertRedirect('login');
});

it('requires validation', function () {
    $this->actingAs($user = User::factory()->create());

    visit('/profile/settings')
        ->click('@account-button')
        ->click('@delete-account-button')
        ->assertSee('The email field is required.')
        ->assertSee('The password field is required.')
        ->click('@account-button')
        ->fill('@delete-email', 'example@gmail.com')
        ->fill('@delete-password', '12345678')
        ->click('@delete-account-button')
        ->assertSee('The provided email does not match your current email.')
        ->assertSee('The password is incorrect.');

    expect(User::count())->toBe(1);
});

it('updates the account', function () {
    $this->actingAs($user = User::factory()->create(['password' => bcrypt('12345678')]));

    visit('/profile/settings')
        ->click('@account-button')
        ->fill('@delete-email', $user->email)
        ->fill('@delete-password', '12345678')
        ->click('@delete-account-button')
        ->assertRoute('login');

    expect(User::count())->toBe(0);
});