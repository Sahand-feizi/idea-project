<?php

use App\Models\Idea;
use App\Models\Step;
use App\Models\User;

it('Updatess an idea', function () {
    $this->actingAs($user = User::factory()->create());

    $idea = Idea::factory()->for($user)->create();

    $title = 'doing something';
    $description = 'some dumy text';

    visit("/ideas/{$idea->id}")
        ->click('@update-idea-button')
        ->fill('title', $title)
        ->fill('description', $description)
        ->click('@button-status-in_progress')
        ->fill('@add-step-input', 'first step')
        ->click('@add-step-button')
        ->fill('@add-link-input', 'https://example.com')
        ->click('@add-link-button')
        ->click('@update-button')
        ->assertPathIs("/ideas/{$idea->id}");

    expect($user->ideas()->first())->toMatchArray([
        'title' => $title,
        'description' => $description,
        'status' => 'in_progress',
    ]);

    expect(Step::count())->toBe(1);
});

it('requires authorization', function () {
    $this->actingAs($user = User::factory()->create());

    $idea = Idea::factory()->create();

    $this->patch("/ideas/{$idea->id}")->assertForbidden();
});
