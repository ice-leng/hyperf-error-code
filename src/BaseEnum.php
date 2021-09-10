<?php

namespace Lengbin\Hyperf\ErrorCode;

use Hyperf\Contract\TranslatorInterface;
use Hyperf\Utils\ApplicationContext;
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
        if (ApplicationContext::hasContainer() && ApplicationContext::getContainer(TranslatorInterface::class)) {
            return __(parent::getMessage(), $replace, $locale);
        }
        return parent::getMessage($replace);
    }
}
