<?php

use App\Models\Idea;
use App\Models\User;

it('requires authentication', function () {
    $idea = Idea::factory()->create();

    $this->get("/ideas/{$idea->id}")->assertRedirect('login');
});

it('requires authorization', function () {
    $this->actingAs(User::factory()->create());

    $idea = Idea::factory()->create();

    $this->get("/ideas/{$idea->id}")->assertForbidden();
});
