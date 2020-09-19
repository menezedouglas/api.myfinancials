<?php


if(! function_exists('ifNull')) {

    function ifNull($value, $default) {

        return (is_null($value)) ? $default : $value ;

    }

}

if(! function_exists('in')) {

    function in($data = [], $in) {

        $verify = false;

        foreach ($data as $d):
            if($d === $in) $verify = true;
        endforeach;

        return $verify;

    }

}

if(! function_exists('notIn')) {

    function notIn($data = [], $notIn) {

        $verify = false;

        foreach ($data as $d):
            if($d === $notIn) $verify = true;
        endforeach;

        return !$verify;

    }

}
