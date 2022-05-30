<?php

namespace xand3rxx\XBlog\Fields;

use xand3rxx\XBlog\MarkdownParser;

class Body extends FieldContract
{
    /**
     * Parse the body content.
     *
     * @param string $type 
     * @param string $value 
     * @param $data
     */
    public static function parse(string $type, string $value, $data)
    {
        return [
            $type => MarkdownParser::parse($value)
        ];
    }
}
