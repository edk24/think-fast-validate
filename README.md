# think-fast-validate

快速验证器

## 安装

> composer require yuxiaobo/think-fast-validate

## 用法

```php
// 登录接口操作
public function login() {
    try {

        $data = (new UserValidate())->post()->goCheck('login');

    } catch (\think\ValidateException $e) {

        // TODO 验证失败逻辑

    }
}

```

其中：

- UserValidate 是你的验证器， 它需要继承 `think\FastValidate`
- post() 表示这个请求接收 POST 数据
- goCheck() 验证， 其中参数 1 是【验证场景】可空
- $data 既 post 提交的数据

## 联系我

微信：Base1024
