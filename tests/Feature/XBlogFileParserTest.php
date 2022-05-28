<?php

namespace xand3rxx\XBlog\Tests;

use Orchestra\Testbench\TestCase;
use xand3rxx\XBlog\XBlogFileParser;

class XBlogFileParserTest extends TestCase
{
    /**
     * A test to ascertain that the head and body are spliitted.
     * @test
     * @return void
     */
    public function can_split_head_and_body()
    {
        $fileParser = (new XBlogFileParser(__DIR__.'/../blogs/MarkFile1.md'));

        $result = $fileParser->splittedFileSections();

        $this->assertContains('title: Blog Post Title', $result[0]);
        $this->assertContains('description: Blog post description goes here', $result[1]);
        $this->assertContains('Blog post full description goes here', $result[2]);
    }
}