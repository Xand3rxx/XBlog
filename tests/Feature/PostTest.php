<?php

namespace xand3rxx\XBlog\Tests;

use Orchestra\Testbench\TestCase;
use xand3rxx\XBlog\MarkdownParser;
use xand3rxx\XBlog\app\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test to ascertain that a post can be created from seed.
     * @test
     * @return void
     */
    public function can_create_posts_from_seeders()
    {
        // Create post records with factory
        Post::factory()->create();

        $this->assertEquals(1, (int)Post::count());
    }

    /**
     * A basic test to ascertain that a post can be created.
     * @test
     * @return void
     */
    public function can_create_post()
    {
        $this->assertEquals('<h1>Hello XBlog</h1>', MarkdownParser::parse('# Hello XBlog'));
    }
}