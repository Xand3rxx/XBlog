<?php

namespace xand3rxx\XBlog;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class XBlogFileParser
{
    protected $filename;
    protected $rawData;
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
        $this->explodeData();
        $this->processFields();
    }

    /**
     * The raw splitted sections the MarkFile1.md file content.
     *
     * @return array $data 
     */
    public function rawSplittedFileSections()
    {
        return $this->rawData;
    }

    /**
     * The cleaned splitted sections the MarkFile1.md file content.
     *
     * @return array $data 
     */
    public function splittedFileSections()
    {
        return $this->data;
    }

    /**
     * Splits the MarkFile1.md file content into header and body.
     */
    public function splitFile()
    {
        preg_match(
            '/^\-{3}(.*?)\-{3}(.*)/s',
            File::exists($this->filename) ? File::get($this->filename) : $this->filename,
            $this->rawData
        );
    }

    protected function explodeData()
    {
        foreach (explode("\n", trim($this->rawData[1])) as $fieldString) {
            // Match keys to value
            preg_match('/(.*):\s?(.*)/', $fieldString, $fieldArray);

            // Assign value to key
            $this->data[$fieldArray[1]] = $fieldArray[2];
        }

        // Assign the body content
        $this->data['body'] = trim($this->rawData[2]);
    }

    /**
     * Format key values to specific types.
     */
    protected function processFields()
    {
        foreach ($this->data as $key => $value) {
            // Get the accurate class directory.
            $class = 'xand3rxx\\XBlog\\Fields\\' . Str::title($key);

            // If key is unaccounted for, parse with the Extra class
            if (!class_exists($class) && !method_exists($class, 'parse')) {
                $class = 'xand3rxx\\XBlog\\Fields\\Extra';

                $this->data = array_merge($this->data, $class::parse($key, $value, $this->data));
            }

            // If key is knownn find the appropriate field class
            $this->data = array_merge($this->data, $class::parse($key, $value, $this->data));
        }
    }
}
