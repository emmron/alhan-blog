<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * When I create a new post, I should see it on the homepage
     *
     * @return void
     */
    public function testSeeLatestPostOnHomePage()
    {
        $post = factory(\App\Post::class)->create();
        $response = $this->get('/');
        $response->assertSee($post->title);
    }

    /**
     * When I visit the /posts page, I should see all posts
     *
     * @return void
     */
    public function testSeeAllPosts()
    {
        $posts = \App\Post::all();
        $response = $this->get('/posts');
        $response->assertSee($posts->first()->title);
        $response->assertSee($posts->last()->title);
    }

    /**
     * I should be able to see the post when I visit the post
     *
     * @return void
     */
    public function testSeeIndividualPost()
    {
        $post = factory(\App\Post::class)->create();
        $response = $this->get('posts/' . $post->id);
        $response->assertSee($post->title);
    }
}
