<?php

namespace Lengbin\Hyperf\ErrorCode;

use Hyperf\Contract\TranslatorInterface;
use Hyperf\Contract\ConfigInterface;
use Lengbin\ErrorCode\AbstractEnum;
use Lengbin\Helper\YiiSoft\Arrays\ArrayHelper;
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
            $config = CommonHelper::getContainer()->get(ConfigInterface::class)->get('errorCode', []);
            $translate = ArrayHelper::get($config, 'translate', 'messages');
            return __("{$translate}.{$message}", $replace, $locale);
        }
        return parent::getMessage($replace);
    }
}
