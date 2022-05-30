<?php

namespace xand3rxx\XBlog\Tests;

use Carbon\Carbon;
use xand3rxx\XBlog\Tests\TestCase;
use xand3rxx\XBlog\XBlogFileParser;

class XBlogFileParserTest extends TestCase
{
    /**
     * A test to ascertain that the head and body are spliitted.
     * @test
     * @return void
     */
    public function can_split_header_and_body_sections()
    {
        $result = $this->markdownFile()->rawSplittedFileSections();

        $this->assertStringContainsString('title: Blog Post Title', $result[1]);
        $this->assertStringContainsString('description: Blog post description goes here', $result[1]);
        $this->assertStringContainsString('Blog post full description goes here', $result[2]);
    }

    /**
     * A test to ascertain that the header can be convertered to key => value pairs.
     * @test
     * @return void
     */
    public function can_split_header_into_key_value_pair()
    {
        $result = $this->markdownFile()->splittedFileSections();

        $this->assertEquals('Blog Post Title', $result['title']);
        $this->assertEquals('Blog post description goes here', $result['description']);
    }

    /**
     * A test to ascertain that the header can be convertered to key => value pairs.
     * @test
     * @return void
     */
    public function can_get_body_section()
    {
        $result = $this->markdownFile()->splittedFileSections();

        $this->assertEquals("<h1>Header</h1>\n<p>Blog post full description goes here</p>", $result['body']);
    }

    /**
     * A test to ascertain that the an html string can also be can parsed.
     * @test
     * @return void
     */
    public function can_also_parse_html_string()
    {
        $result = $this->markdownHTML()->rawSplittedFileSections();

        $this->assertStringContainsString('title: Blog Post Title', $result[1]);
        $this->assertStringContainsString('description: Blog post description goes here', $result[1]);
        $this->assertStringContainsString('Blog post full description goes here', $result[2]);
        $this->assertEquals("<h1>Header</h1>\n<p>Blog post full description goes here</p>", $this->markdownHTML()->splittedFileSections()['body']);
    }

    /**
     * A test to ascertain that the an html string can also be can parsed.
     * @test
     * @return void
     */
    public function can_parse_a_date_field()
    {
        $result = $this->markdownHTML()->splittedFileSections();

        $this->assertInstanceOf(Carbon::class, $result['date']);
        $this->assertEquals('01/11/2017', $result['date']->format('m/d/Y'));
    }

    // /**
    //  * A test to ascertain that the an unaccounted key-pair value can be saved.
    //  * @test
    //  * @return void
    //  */
    // public function can_save_extra_field()
    // {
    //     $result = $this->markdownHTML()->splittedFileSections();

    //     $this->assertEquals(json_encode(['author' => 'Anthony Joboy']), $result['extraField']);
    // }

    // /**
    //  * A test to ascertain that the another unaccounted key-pair value can be saved.
    //  * @test
    //  * @return void
    //  */
    // public function can_save_another_extra_fields()
    // {
    //     $result = $this->markdownHTML()->splittedFileSections();
    //     dd(json_decode($result['extraField'])); 

    //     $this->assertEquals(json_encode(['author' => 'Anthony Joboy', 'avatar' => 'image.jpg']),$result['extraField']);
    // }

    /**
     * Get the test markdown file contents.
     * @return file
     */
    private function markdownFile()
    {
        return (new XBlogFileParser(__DIR__ . '/../blogs/MarkFile1.md'));
    }

    /**
     * Get the test markdown html contents.
     */
    private function markdownHTML()
    {
        return (new XBlogFileParser(
            "---\ntitle: Blog Post Title\ndescription: Blog post description goes here\ndate: January 11, 2017\nauthor: Anthony Joboy\navatar: image.jpg\n---\n<h1>Header</h1>\n<p>Blog post full description goes here</p>"
        ));
    }
}
