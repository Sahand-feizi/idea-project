<?php

namespace App\Actions;

use App\Models\Idea;
use DB;
use Illuminate\Support\Facades\Storage;

class UpdateIdea {
    public function handel(array $attributes, Idea $idea){
        $data = collect($attributes)->only([
            'title', 
            'description',
            'status',
            'links'
        ])->toArray();

        $data['image_path'] = '';

        if($idea->image_path ?? false){
            Storage::disk('public')->delete($idea->image_path);
        }

        if($attributes['image'] ?? false){
            $data['image_path'] = $attributes['image']->store('ideas', 'public');
        }

        DB::transaction(function () use($idea, $data, $attributes) {
            $idea->update($data);

            $idea->steps()->delete();

            $idea->steps()->createMany($attributes['steps'] ?? []);
        });
    }
}