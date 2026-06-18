<?php

use App\Models\User;
use App\Notifications\UpdateAccount;

it('requires authentication', function () {
    $this->patch('/profile')->assertRedirect('login');
});

it('requires validation', function () {
    $this->actingAs($user = User::factory()->create());

    visit('/profile/settings')
        ->fill('name', 'new name')
        ->click('@update-btn')
        ->assertSee('The email field is required.')
        ->assertSee('The password field is required.')
        ->fill('email', 'example@gmail.com')
        ->fill('password', '123456789')
        ->click('@update-btn')
        ->assertSee('The provided email does not match your current email.')
        ->assertSee('The password is incorrect.');

    $user->refresh();

    expect($user)->not->toMatchArray([
        'name' => 'new name',
    ]);
});

it('updates the account', function () {
    $this->actingAs($user = User::factory()->create(['password' => bcrypt('12345678')]));

    visit('/profile/settings')
        ->fill('name', 'new name')
        ->fill('email', $user->email)
        ->fill('password', '12345678')
        ->click('@update-btn');

    $user->refresh();

    expect($user)->toMatchArray([
        'name' => 'new name',
    ]);
});

it('notifies the user when someone updates the email', function () {
    $this->actingAs($user = User::factory()->create(['password' => bcrypt('12345678')]));

    Notification::fake();

    $orginalEmail = $user->email;

    visit('/profile/settings')
        ->fill('name', 'new name')
        ->fill('email', $user->email)
        ->fill('new_email', 'example@gmail.com')
        ->fill('password', '12345678')
        ->click('@update-btn');

    Notification::assertSentOnDemand(UpdateAccount::class, fn (UpdateAccount $notification, $routes, $notifiable) => $notifiable->routes['mail'] === $orginalEmail);
});
