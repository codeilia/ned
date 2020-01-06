<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 1/12/2019
 * Time: 5:05 AM
 */

namespace App\Nedsa;

use GuzzleHttp\Client;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class ExceptionReporter
{
//    public static function sendToTelegram($exception)
//    {
//        $currentPath = $_SERVER['REQUEST_URI'] ?? 'ARTISAN';
//
//        $post_fields = array(
//            'chat_id' => "90281585",
//            'text' => str_limit(print_r([
//                'Case: وامیار',
//                'Path: ' . $currentPath ?? 'without path',
//                'method: ' . request()->getMethod(),
//                'agent: ' . request()->userAgent(),
//                'Error: ' . $exception->getMessage() ?? 'No msg',
//                'Code: ' . $exception->getCode() ?? 'no code',
//                'IP: ' . request()->ip(),
//                'Trace: ' . $exception->getTraceAsString(),
//                'File: ' . $exception->getFile(),
//                //$e->getTrace(),
//            ], 1), 700),
//        );
//        //print_r($post_fields);
//        $curl = curl_init();
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => "https://api.telegram.org/bot795466161:AAFv9AtGYrNAmbu8MFrvbf9bq5QARtGWG4I/sendMessage",
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => "",
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 30,
//            CURLOPT_SSL_VERIFYPEER => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_POSTFIELDS => $post_fields,
//            CURLOPT_HTTPHEADER => array(
//                "Content-Type:multipart/form-data"
//            )
//        ));
//        $response = curl_exec($curl);
//        $err = curl_error($curl);
//        curl_close($curl);
//    }
}
