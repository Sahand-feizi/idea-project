<?php

use App\Models\User;

it('Creates a new idea', function () {
    $this->actingAs($user = User::factory()->create());

    $title = 'Some example title';
    $description = 'A domy description';

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', $title)
        ->click('@button-status-in_progress')
        ->fill('description', $description)
        ->click('@create-button')
        ->assertPathIs('/ideas');

    expect($user->ideas()->first())->toMatchArray([
        'title' => $title,
        'status' => 'in_progress',
        'description' => $description,
    ]);
});
