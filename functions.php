<?php
/**
 * Функция извлечения данных из смс
 * @param string $data
 * @return array
 */
function extractData(string $data) : array {
    return [
        "code" => extractCode($data),
        "sum" => extractSum($data),
        "bill" => extractBill($data),
    ];
}

/**
 * @param string $data
 * @return string
 */
function extractCode(string $data) : string {
    $matches = [];
    preg_match('/:\s?([\d]{4})/', $data, $matches);
    if (!empty($matches[1])) {
        return $matches[1];
    }
    return "";
}

/**
 * @param string $data
 * @return string
 */
function extractSum(string $data) : string {
    $matches = [];
    preg_match('/\s?([\d\.\,]+)[р|r]/', $data, $matches);
    if (!empty($matches[1])) {
        return $matches[1];
    }
    return "";
}

/**
 * @param string $data
 * @return string
 */
function extractBill(string $data) : string {
    $matches = [];
    preg_match('/([\d]{15})/', $data, $matches);
    if (!empty($matches[1])) {
        return $matches[1];
    }
    return "";
}
