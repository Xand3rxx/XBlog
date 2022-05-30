<?php

namespace xand3rxx\XBlog\Fields;

abstract class FieldContract
{
    /**
     * Contract of expected fields.
     *
     * @param string $fieldType 
     * @param string $fieldValue 
     * @param $data
     *  
     * @return string $fieldType 
     */
    public static function parse(string $fieldType, string $fieldValue, $data)
    {
        return [
            $fieldType => $fieldValue
        ];
    }
}
