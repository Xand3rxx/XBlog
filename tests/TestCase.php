<?php

namespace xand3rxx\XBlog\Tests;

use xand3rxx\XBlog\XBlogBaseServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/../database/factories');
    }

     /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app)
    {
        return [
            XBlogBaseServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Define your environment setup.
        $app['config']->set('database.default', 'blog');
        $app['config']->set('database.connections.blog', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);
    }
}
