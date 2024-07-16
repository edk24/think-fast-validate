<?php

namespace think\test\validate;

use think\FastValidate;

class UserValidate extends FastValidate
{
    protected $rule = [
        'email'     => 'require|email',
        'password'  => 'require|length:6,25',
    ];


    protected $field = [
        'email'     => '邮箱',
        'password'  => '密码',
    ];

    protected $scene = [
        'login' => ['email', 'password'],
    ];
}