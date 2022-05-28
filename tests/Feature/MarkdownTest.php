<?php

namespace xand3rxx\XBlog\Tests;

use Orchestra\Testbench\TestCase;
use xand3rxx\XBlog\MarkdownParser;

class MarkdownTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function can_execute_parse_down()
    {
        $this->assertEquals('<h1>Hello XBlog</h1>', MarkdownParser::parse('# Hello XBlog'));
    }
}