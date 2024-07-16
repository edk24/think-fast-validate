<?php

namespace think\test\validate;

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    public function testCheck()
    {
        // TODO 无法模拟 request()，暂时无法测试
        
        $validate = new UserValidate();
        $data = $validate->goCheck('login');

        $this->assertArrayHasKey('email', $data);
        $this->assertArrayHasKey('password', $data);
    }

}
