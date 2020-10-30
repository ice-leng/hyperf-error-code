<?php

namespace Lengbin\Hyperf\ErrorCode;

use Hyperf\Contract\TranslatorInterface;
use Hyperf\Contract\ConfigInterface;
use Lengbin\ErrorCode\AbstractEnum;
use Lengbin\Hyperf\Common\Helper\CommonHelper;

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
        if (CommonHelper::getContainer()->has(TranslatorInterface::class)) {
            $message = parent::getMessage();
            $config = CommonHelper::getContainer()->get(ConfigInterface::class);
            //->get('errorCode', []);
            $enable = $config->get('errorCode.translate_enable', false);
            if (!$enable) {
                return parent::getMessage($replace);
            }
            $translate = $config->get('errorCode.translate', 'errorCode');
            return __("{$translate}.{$message}", $replace, $locale);
        }
        return parent::getMessage($replace);
    }
}
