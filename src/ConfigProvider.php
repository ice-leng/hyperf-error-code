<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Lengbin\Hyperf\ErrorCode;

use EasySwoole\Skeleton\Command\ErrorCodeCommand;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [

            ],
            'annotations'  => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'commands' => [
                ErrorCodeCommand::class
            ],
            'publish'      => [
                [
                    'id'          => 'error-code',
                    'description' => 'The config for error code.',
                    'source'      => __DIR__ . '/../publish/errorCode.php',
                    'destination' => BASE_PATH . '/config/autoload/errorCode.php',
                ],
            ],
        ];
    }
}
