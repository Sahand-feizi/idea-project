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
        ->fill('@add-link-input', 'https://example.com')
        ->click('@add-link-button')
        ->fill('@add-link-input', 'https://example2.com')
        ->click('@add-link-button')
        ->click('@create-button')
        ->assertPathIs('/ideas');

    expect($user->ideas()->first())->toMatchArray([
        'title' => $title,
        'status' => 'in_progress',
        'description' => $description,
        'links' => ['https://example.com', 'https://example2.com'],
    ]);
});
