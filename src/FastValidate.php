<?php

declare(strict_types=1);

namespace think;

use think\enums\RequestMethod;
use think\exception\ValidateException;

/**
 * 快速验证类
 * 
 * 用法 $postData = (new 验证器())->post()->goCheck('scene');
 */
class FastValidate extends \think\Validate
{
    /**
     * 请求方式
     */
    public RequestMethod $method = RequestMethod::GET;

    
    /**
     * 设置请求方式
     */
    public function post()
    {
        if (!request()->isPost()) {
            throw new ValidateException('请求方式错误，请使用 POST 请求');
        }
        $this->method = RequestMethod::POST;

        return $this;
    }

    /**
     * 设置请求方式
     */
    public function get()
    {
        if (!request()->isGet()) {
            throw new ValidateException('请求方式错误，请使用 GET 请求');
        }
        $this->method = RequestMethod::GET;


        return $this;
    }

    /**
     * 设置请求方式
     */
    public function delete()
    {
        if (!request()->isDelete()) {
            throw new ValidateException('请求方式错误，请使用 DELETE 请求');
        }
        $this->method = RequestMethod::DELETE;


        return $this;
    }

    /**
     * 设置请求方式
     */
    public function put()
    {
        if (!request()->isPut()) {
            throw new ValidateException('请求方式错误，请使用 PUT 请求');
        }
        $this->method = RequestMethod::PUT;


        return $this;
    }


    public function patch()
    {
        if (!request()->isPatch()) {
            throw new ValidateException('请求方式错误，请使用 PATCH 请求');
        }
        $this->method = RequestMethod::PATCH;
    }


    /**
     * 切面验证接收到的参数
     * @throws ValidateException
     */
    public function goCheck(string $scene = null, array $extendValidateData = []): array
    {
        //接收参数
        switch ($this->method) {
            case RequestMethod::GET:
                $params = request()->get();
                break;
            case RequestMethod::POST:
                $params = request()->post();
                break;
            case RequestMethod::PUT:
                $params = request()->put();
                break;
            case RequestMethod::DELETE:
                $params = request()->delete();
                break;
            case RequestMethod::PATCH:
                $params = request()->patch();
                break;
            default:
                throw new ValidateException('不支持该请求类型');
        }

        //合并验证参数
        $params = array_merge($params, $extendValidateData);

        //场景
        if ($scene) {
            $result = $this->scene($scene)->check($params);
        } else {
            $result = $this->check($params);
        }

        if (!$result) {
            $exception = is_array($this->error) ? implode(';', $this->error) : $this->error;
            throw new ValidateException($exception);
        }

        return $params;
    }
}