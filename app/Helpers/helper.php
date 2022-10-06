<?php

if (!function_exists('customResponse')) {

    function customResponse($data = [], $code = 200, $error = "", $custom_code = null)
    {
        return response()->json([
            'data'    => $data,
            'code'    => $custom_code ? $custom_code : $code,
            'message' => $error
        ], $code);
    }
}
