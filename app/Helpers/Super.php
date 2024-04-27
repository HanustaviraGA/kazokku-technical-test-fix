<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;
use GuzzleHttp\Client;

/**
 * Display a table based on given module or query.
 * @return Renderable
 */
function select_table($queryOrModel){

    if ($queryOrModel instanceof Model) {
        $query = $queryOrModel->newQuery();
    } elseif ($queryOrModel instanceof Builder) {
        $query = $queryOrModel;
    } elseif ($queryOrModel instanceof Collection) {
        if ($queryOrModel->isEmpty()) {
            return DataTables::of($queryOrModel)->make(true);
        }
        $query = $queryOrModel->toQuery();
    } else {
        throw new \InvalidArgumentException('Invalid query or model provided.');
    }

    $table = $query->getModel()->getTable();
    $columns = Schema::getColumnListing($table);

    return DataTables::of($query)
    ->addColumn('no', function ($data) {
        static $count = 1;
        $primaryKeyValue = base64_encode(json_encode($data->getKey()));
        return '<td><span style="margin-left: 20px !important;">' . $count++ . '.</span><input type="checkbox" name="checkbox" data-record="' . $primaryKeyValue . '" style="display: none;"></td>';
    })
    ->rawColumns(['no'])
    ->make(true);
}

/**
 * Display an encoded view of a page.
 * @return Renderable
 */
function loadPage($page, $data = []){
    $view = view($page, $data)->render();
    $base64 = base64_encode($view);
    return response()->json(['page' => $base64]);
}

/**
 * Generate unique code.
 */
function generateCode($prefix = 'KZK') {
    $date = date('ymd');
    $suffix = generateSuffix();
    return $prefix . '.' . $date . '.' . $suffix;
}

/**
 * Generate unique suffix.
 */
function generateSuffix() {
    $suffix = '';
    $length = 5; // Desired length of the suffix (5 characters)

    while (strlen($suffix) < $length) {
        $randType = rand(0, 2); // Randomly choose 0 for letter, 1 for number, 2 for alphanumeric

        if ($randType === 0) {
            $suffix .= chr(rand(65, 90)); // Random letter from A to Z
        } elseif ($randType === 1) {
            $suffix .= rand(0, 9); // Random number from 0 to 9
        } else {
            $suffix .= chr(rand(65, 90)) . rand(0, 9); // Random alphanumeric combination
        }
    }

    // Trim or pad the suffix to ensure it has exactly 5 characters
    $suffix = substr($suffix, 0, $length);

    return $suffix;
}

/**
 * Unix Epoch Conversion.
 */
function ts_conv($ts){
    $timestamp_sec = $ts / 1000;
    $date = date("Y-m-d H:i:s", $timestamp_sec);
    return $date;
}

/**
 * Exchange Rate Sync.
 */
function sync_exchange(){
    $api = env('FIXER_API_KEY');
    $https = env('FIXER_HTTPS');
    if($https == true){
        $url = 'https://data.fixer.io/api/latest?access_key='.$api.'';
    }else{
        $url = 'http://data.fixer.io/api/latest?access_key='.$api.'';
    }
    $client = new Client();
    $response = $client->request('GET', $url);
    $body = $response->getBody()->getContents();
    $decode = json_decode($body, true);
    $data = [
        'status' => $response->getStatusCode(),
        'data' => $decode
    ];
    return $data;
}
