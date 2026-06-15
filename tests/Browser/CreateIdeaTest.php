<?php

use App\Models\Step;
use App\Models\User;

it('Creates a new idea', function () {
    $this->actingAs($user = User::factory()->create());

    $title = 'doing something';
    $description = 'some dumy text';

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', $title)
        ->fill('description', $description)
        ->click('@button-status-in_progress')
        ->fill('@step-input', 'first step')
        ->click('@add-step-button')
        ->fill('@add-link-input', 'https://example.com')
        ->click('@add-link-button')
        ->click('@create-button')
        ->assertPathIs('/ideas');

    expect($user->ideas()->first())->toMatchArray([
        'title' => $title,
        'description' => $description,
        'links' => ['https://example.com'],
        'status' => 'in_progress',
    ]);

    expect(Step::count())->toBe(1);
});

it('requires the title input', function () {
    $this->actingAs($user = User::factory()->create());

    visit('/ideas')
        ->click('@create-idea-button')
        ->click('@create-button')
        ->assertPathIs('/ideas');

    expect($user->ideas->count())->toBe(0);
});
