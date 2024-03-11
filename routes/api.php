<?php

use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/example', [ExampleController::class, 'index']);
Route::get('/http-api', function (Request $request) {
    // This is a test to call an external API
    $url = $request->get('url', 'https://api.coindesk.com/v1/bpi/currentprice.json');
    $response = Http::get($url);
    return response()->json([
        'message' => "Called to $url",
        'data' => $response->json(),
    ]);
});
Route::get('/complex-code', function () {
    $begin = microtime(true);
    $tests = 1000000;
    $max = 1000001;
    for ($i = 1; $i <= $max; $i += 10000) {
        //create lookup array
        $array = array_fill(0, $i, null);
        //build test indexes
        $test_indexes = array();
        for ($j = 0; $j < $tests; $j++) {
            $test_indexes[] = rand(0, $i - 1);
        }
        //benchmark array lookups
        $start = microtime(true);
        foreach ($test_indexes as $test_index) {
            $value = $array[$test_index];
            unset($value);
        }
        $stop = microtime(true);
        unset($array, $test_indexes, $test_index);
        unset($stop, $start);
    }
    $end = microtime(true);
    return response()->json([
        'message' => "Complex code executed in ".($end - $begin)." seconds"
    ]);
});
