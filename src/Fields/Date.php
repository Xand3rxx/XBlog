<?php

namespace xand3rxx\XBlog\Fields;

use Carbon\Carbon;

class Date extends FieldContract
{
    /**
     * Carbon parse a date string.
     *
     * @param string $type 
     * @param string $value 
     * @param $data
     */
    public static function parse(string $type, string $value, $data)
    {
        return [
            $type => Carbon::parse($value)
        ];
    }
}
