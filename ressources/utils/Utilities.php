<?php

namespace App\utils;

class Utilities {

    public function getPaging($page, $totalRows, $limit, $pageUrl) {

        $pagingArr = array();

        $pagingArr["first"] = $page > 1 ? "{$pageUrl}page=1" : NULL;

        $totalPages = ceil($totalRows / $limit);

        $range = 2;

        $initial_num = $page - $range;
        $condition_limit_num = ($page + $range) + 1;

        $pagingArr['pages'] = array();
        $page_count = 0;

        for ($x = $initial_num; $x < $condition_limit_num; $x++) {
            if (($x > 0) && ($x <= $totalPages)) {
                $pagingArr['pages'][$page_count]["page"] = $x;
                $pagingArr['pages'][$page_count]["url"] = "{$pageUrl}page={$x}";
                $pagingArr['pages'][$page_count]["currentPage"] = $x == $page ? TRUE : FALSE;

                $page_count++;
            }
        }

        $pagingArr["last"] = $page < $totalPages ? "{$pageUrl}page={$totalPages}" : NULL;

        return $pagingArr;
    }

    public function core() {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $host = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';

        $homeUrl = "$protocol://$host/hospital-ms/api/";

        $page = !isset($_GET['page']) ? $_GET['page'] : 1;

        $limit = 20;

        $start = ($limit * $page) - $limit;
    }

    public function getAuthorizationHeader() {

        $headers = null;

        if (isset($_SERVER['Authorization'])) {

            $headers = trim($_SERVER["Authorization"]);
        } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {

            $requestHeaders = apache_request_headers();

            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));

            if (isset($requestHeaders['Authorization'])) {

                $headers = trim($requestHeaders['Authorization']);
            }
        }

        return $headers;
    }

    public function getBearerToken() {

        $headers = $this->getAuthorizationHeader();

        if (!empty($headers)) {

            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {

                return $matches[1];
            }
        }

        $customResponse->returnResponse("Erreur", "Access Token Not found");
    }

    static function headers() {
        // send some CORS headers so the API can be called from anywhere
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,PATCH,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        foreach (headers_list() as $header) {
            if (strpos($header, 'X-Powered-By:') !== false) {
                header_remove('X-Powered-By');
            }
            header_remove('X-Test');
        }
    }

}
