<?php

namespace TencentMap\Error;

use Throwable;

class TencentMapError extends \Error
{
    private const ERROR_ARRAY = [
        310 => 'boundary 参数未设置',
    ];

    protected $code;

    protected $message;

    public function __construct(?string $message, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        if (!($message)) {
            $message = null;
        }

        $this->message = $message ?? self::ERROR_ARRAY[$code] ?? '未知错误';

        $this->code = $code;
    }
}
