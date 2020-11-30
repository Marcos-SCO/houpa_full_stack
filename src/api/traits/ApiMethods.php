<?php

namespace Api\Traits;

trait ApiMethods
{
    public function getContents($input = 'php://input')
    {
        $input = json_decode(file_get_contents($input), true);

        return $input;
    }

    public function getPostData() {
        // return $_POST;
        return filter_input_array(INPUT_POST, $_POST, FILTER_DEFAULT);
    }
}
