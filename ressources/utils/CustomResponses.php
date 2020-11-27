<?php

namespace App\utils;
class CustomResponses{

    private $message;
    private $title;
    private $data;

    public function getMessage() {
        return $this->message;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function returnResponse($title, $message, $data = null) {
        $response = json_encode(($data !== null) ? $data : ['title' => $title, 'message' => $message]);
        echo $response;
        exit;
    }

    public function errorMessage($code, $message) {
        $errorMsg = json_encode(['error' => ['status' => $code, 'message' => $message]]);
        echo $errorMsg;
        exit;
    }

    public function validateParameter($fieldName, $value, $dataType, $required = true) {
        if ($required == true && empty($value) == true) {
            $this->errorMessage(Constants::VALIDATE_PARAMETER_REQUIRED, $fieldName . " parameter is required.");
        }

        switch ($dataType) {
            case Constants::BOOLEAN:
                if (!is_bool($value)) {
                    $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be boolean.');
                }
                break;
            case Constants::NUMERIC:
                if (!is_numeric($value)) {
                    $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be numeric.');
                }
                break;
            case Constants::INTEGER:
                if (!is_int($value)) {
                    $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be integer.');
                }
                break;
            case Constants::STRING:
                if (!is_string($value)) {
                    $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be string.');
                }
                break;
            case Constants::ARRAYS:
                if (!is_array($value)) {
                    $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be array.');
                }
                break;
            case Constants::OBJECT:
                if (!is_object($value)) {
                    $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be object.');
                }
                break;
            case Constants::FLOAT:
                if (!is_float($value)) {
                    $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be floar or double.');
                }
                break;
            case Constants::NULL:
                if (!is_null($value)) {
                    $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName . '. It should be string.');
                }
                break;
            default:
                $this->errorMessage(Constants::VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for " . $fieldName);
                break;
        }
        return $value;
    }

}