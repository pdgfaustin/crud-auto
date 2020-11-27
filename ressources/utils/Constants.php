<?php

namespace App\utils;

class Constants{
    /* Security */

    const SECRETE_KEY = 'D=B2-4*A*C';

    /* Data Type */
    const BOOLEAN = '1';
    const NUMERIC = '2';
    const INTEGER = '3';
    const FLOAT = '4';
    const STRING = '5';
    const ARRAYS = '6';
    const OBJECT = '7';
    const NULL = '8';

    /* Error Codes */
    const REQUEST_METHOD_NOT_VALID = 100;
    const REQUEST_CONTENTTYPE_NOT_VALID = 101;
    const REQUEST_NOT_VALID = 102;
    const VALIDATE_PARAMETER_REQUIRED = 103;
    const VALIDATE_PARAMETER_DATATYPE = 104;
    const API_NAME_REQUIRED = 105;
    const API_PARAM_REQUIRED = 106;
    const API_DOST_NOT_EXIST = 107;
    const INVALID_USER_PASS = 108;
    const USER_NOT_ACTIVE = 109;
    const SUCCESS_RESPONSE = 200;

    const __default = self::OK;
    
    // 2×× Success
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NON_AUTHORITATIVE_INFORMATION = 203;
    const NO_CONTENT = 204;
    const RESET_CONTENT = 205;
    const PARTIAL_CONTENT = 206;
    const MULTI_STATUS = 207;
    const ALREADY_REPORTED = 208;
    const IM_USED = 226;
    // 3×× Redirection
    const MULTIPLE_CHOICES = 300;
    const MOVED_PERMANENTLY = 301;
    const MOVED_TEMPORARILY = 302;
    const SEE_OTHER = 303;
    const NOT_MODIFIED = 304;
    const USE_PROXY = 305;
    const TEMPORARY_REDIRECT = 307;
    const PERMANENTLY_REDIRECT = 308;
    // 4×× Client Error
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const PAYMENT_REQUIRED = 402;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const NOT_ACCEPTABLE = 406;
    const PROXY_AUTHENTICATION_REQUIRED = 407;
    const REQUEST_TIMEOUT = 408;
    const CONFLICT = 409;
    const GONE = 410;
    const LENGTH_REQUIRED = 411;
    const PRECONDITION_FAILED = 412;
    const REQUEST_ENTITY_TOO_LARGE = 413;
    const REQUESTURI_TOO_LARGE = 414;
    const UNSUPPORTED_MEDIA_TYPE = 415;
    const REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const EXPECTATION_FAILED = 417;
    const IM_A_TEAPOT = 418;
    const LOCKED = 423;
    // 5×× Server Error
    const INTERNAL_SERVER_ERROR = 500;
    const NOT_IMPLEMENTED = 501;
    const BAD_GATEWAY = 502;
    const SERVICE_UNAVAILABLE = 503;
    const GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;
    const NOT_EXTENDED = 510;
    const NETWORK_AUTHENTICATION_REQUIRED = 511;

    /**
     * BASE DES DONNEES
     */
    const ABONNEMENT = "abonnements";
    const ADRESSE_RDC = "adresse";
    const CATEGORIE_OUVRAGES = "categorieouvrages";
    const COMMUNE = "commune";
    const EDITER_OUVRAGE = "editerouvrage";
    const LECTURE = "lecture";
    const MAISON_EDITION = "maisonedition";
    const NOUVELLE_PROVINCE = "nouvelleprovince";
    const VOITURES = "voitures";
    const PAYS = "pays";
    const PERSONNES  =  "personnes";
    const PROVINCES = "province";
    const QUARTIERS = "quartier";
    const TYPE_ABONNEMENT = "typeabonnement";
    const TYPE_PERSONNE = "typepersonne";
    const TYPE_VOIE = "typevoie";
    const VILLES = "ville";
    const ENTITY_SEQUENCES = "entity_sequences";
}