<?php

namespace xand3rxx\XBlog;

use Illuminate\Support\Facades\File;

class XBlogFileParser
{
    protected $filename;
    protected $data;

    /**
     * Accepts string input and converts it to markdown markup.
     *
     * @param string $filename 
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->splitFile();
    }

    public function splittedFileSections()
    {
        return $this->data;
    }

    /**
     * Splits the MarkFile1.md file content into header and body.
     *
     * @return void 
     */
    public function splitFile()
    {
        preg_match('/^\-{3}(.*?)\-{3}(.*)/s', File::get($this->filename), $this->data);
        // dd($this->data);
    }
}
