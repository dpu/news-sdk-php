<?php

namespace Cn\Xu42\DlpuNews;

class SystemException extends \Exception
{
    protected $message = '系统异常';

    protected $code = '42105000';
}