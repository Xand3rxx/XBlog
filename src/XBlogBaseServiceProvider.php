<?php

namespace xand3rxx\XBlog;

use Illuminate\Support\ServiceProvider;

class XBlogBaseServiceProvider extends ServiceProvider
{
    /**
     * Boot method of this service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
    }

    /**
     * Register method of this service provider.
     *
     * @return void
     */
    public function register()
    {
        // nothing
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
