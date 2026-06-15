<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;

class CreateIdea
{
    public function handel(array $attributes, ?User $user = null): void
    {
        $user ??= Auth::user();

        $data = collect($attributes)->only([
            'title',
            'description',
            'links',
            'status',
        ])->toArray();

        if ($attributes['image'] ?? false) {
            $data['image_path'] = $attributes['image']->store('ideas', 'public');
        }

        DB::transaction(function () use ($data, $attributes, $user) {
            $idea = $user->ideas()->create($data);

            $steps = collect($attributes['steps'] ?? [])->map(fn ($step) => ['description' => $step]);

            $idea->steps()->createMany($steps);
        });

    }
}
