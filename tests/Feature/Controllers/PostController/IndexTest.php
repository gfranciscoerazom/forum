<?php

use App\Models\Post;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;

it('should return the correct component', function () {
    get(route('posts.index'))
        ->assertComponent('posts/Index');
});

it('passes posts to the view', function () {
    $posts = Post::factory(3)->create();

    get(route('posts.index'))
        ->assertInertia(function (AssertableInertia $inertia) {
            dd($inertia->toArray()['props']);
        });

    get(route('posts.index'))
        ->assertHasPaginatedResource('posts', $posts->reverse()->toResourceCollection());
});
