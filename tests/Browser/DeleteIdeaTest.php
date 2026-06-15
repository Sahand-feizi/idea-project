<?php

use App\Models\Idea;
use App\Models\User;

it('deletes an idea', function () {
    $this->actingAs($user = User::factory()->create());

    $idea = Idea::factory()->for($user)->create();

    visit("/ideas/{$idea->id}")
        ->click('@delete-idea-button')
        ->click('@delete-button')
        ->assertPathIs('/ideas');

    expect($user->ideas()->count())->toBe(0);
});

it('requires authorization', function () {
    $this->actingAs(User::factory()->create());

    $idea = Idea::factory()->create();

    $this->delete("/ideas/{$idea->id}")->assertForbidden();
});
