<?php

namespace think\enums;

enum RequestMethod: string {
    case GET = 'GET';
    case POST = 'POST';
    case DELETE = 'DELETE';
    case PUT = 'PUT';
    case PATCH = 'PATCH';
}