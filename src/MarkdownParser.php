<?php

namespace xand3rxx\XBlog;

class MarkdownParser
{
    /**
     * Accepts string input and converts it to markdown markup.
     *
     * @param string $string 
     * @return string $parsedown 
     */
    public static function parse(string $string)
    {
        return \Parsedown::instance()->text($string);
    }
}
