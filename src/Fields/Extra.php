<?php

namespace xand3rxx\XBlog\Fields;

class Extra extends FieldContract
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
        $extra = isset($data['extraField']) ? (array)json_encode($data['extraField']) : [];

        return [
            'extraField' => json_encode(array_merge($extra, [$type => $value]))
        ];
    }
}
