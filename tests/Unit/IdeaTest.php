<?php

use App\Models\Idea;
use App\Models\Step;
use App\Models\User;

test('An idea belongs to an user', function () {
    $idea = Idea::factory()->create();

    expect($idea->user)->toBeInstanceOf(User::class);
});

test('An user could have many ideas', function () {
    $user = User::factory()->create();

    Idea::factory()->count(2)->create([
        'user_id' => $user->id,
    ]);

    expect($user->ideas)
        ->toHaveCount(2)
        ->each(fn ($idea) => $idea->user_id->toBe($user->id));
});

test('An idea could have many steps', function () {
    $idea = Idea::factory()->create();

    Step::factory()->count(2)->create([
        'idea_id' => $idea->id
    ]);

    expect($idea->steps)
        ->toHaveCount(2)
        ->each(fn ($step) => $step->idea_id->toBe($idea->id));
});

test('A step belongs to an idea', function () {
    $step = Step::factory()->create();

    expect($step->idea)->toBeInstanceOf(Idea::class);
});
