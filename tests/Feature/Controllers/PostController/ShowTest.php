<?php

use App\Models\Post;

use function Pest\Laravel\get;

test('can show a post', function () {
    $post = Post::factory()->create();

    get(route('posts.show', $post))
        ->assertComponent('posts/Show');
});
