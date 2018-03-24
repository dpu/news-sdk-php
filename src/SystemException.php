<?php

namespace Org\DLPU\EduNews;

class SystemException extends \Exception
{
    protected $message = '系统异常';

    protected $code = '42105000';
}