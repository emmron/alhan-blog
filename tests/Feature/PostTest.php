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
        $response = $this->get('p/' . $post->slug);
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

    /**
     * I can edit a post and see my change
     *
     * @return void
     */
    public function testEditPost()
    {
        $post = factory(\App\Post::class)->create();
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)
            ->get('posts/' . $post->id .'/edit');
        $response = $this->post('posts/' . $post->id .'/edit', [
                'title' => $post->title . ' this is a test', 
                'body' => $post->body, 
                '_token' => csrf_token()
                ]);
        $response = $this->get('p/' . $post->slug);
        $response->assertSee($post->title . ' this is a test');
    }

    /**
     * I can delete a post and no longer see the post
     *
     * @return void
     */
    public function testDestroyPost()
    {
        $post = factory(\App\Post::class)->create();
        $user = factory(\App\User::class)->create();
        $response = $this->get('p/' . $post->slug);
        $response->assertOk();
        $response = $this->actingAs($user)
            ->get('posts/' . $post->id .'/destroy');
        $response = $this->get('p/' . $post->slug);
        $response->assertNotFound();
    }
}

