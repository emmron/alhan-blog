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

     /**
     * I cannot visit the create page if I'm not logged in
     *
     * @return void
     */
    public function testCreatePageGuestView()
    {
        $response = $this->get('posts/create');
        $response->assertRedirect('login');
    }

     /**
     * I can visit the create page if I'm logged in
     *
     * @return void
     */
    public function testCreatePageUserView()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)
            ->get('posts/create');
        $response->assertSuccessful();
    }

    /**
     * I can create a post
     *
     * @return void
     */
    public function testCreatePost()
    {
        $user = factory(\App\User::class)->create();
        $postTitle = $user->name . '\'s first post';
        $response = $this->actingAs($user)
            ->get('posts/create');
        $response = $this->post('posts/create', [
                'title' => $postTitle, 
                'body' => 'test post body', 
                '_token' => csrf_token()
                ]);
        $response->assertRedirect();
    }
}

