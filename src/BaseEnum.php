<?php

namespace Lengbin\Hyperf\ErrorCode;

use Lengbin\ErrorCode\AbstractEnum;

class BaseEnum extends AbstractEnum
{
    /**
     * 获得
     *
     * @param array       $replace
     * @param string|null $locale
     *
     * @return string
     */
    public function getMessage(array $replace = [], ?string $locale = null): string
    {
        return __(parent::getMessage(), $replace, $locale);
    }
}
