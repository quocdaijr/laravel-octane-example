<?php

/**
 * Author: quocdaijr
 * Time: 10/7/23 11:59 AM
 */

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello world!',
            'status' => 'Connected successfully',
            'data' => 'This is example data'
        ]);
    }
}