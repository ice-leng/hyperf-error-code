<?php

declare(strict_types=1);

namespace Lengbin\Hyperf\ErrorCode\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Hyperf\Contract\ConfigInterface;
use Lengbin\ErrorCode\Command\Merge;
use Psr\Container\ContainerInterface;
use Throwable;

/**
 * @Command
 */
class ErrorCodeCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('gen:error-code');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Generate a new file by merge error code');
    }

    public function handle()
    {
        $config = $this->container->get(ConfigInterface::class)->get('errorCode', []);
        $mergeErrorCode = new Merge($config);
        $mergeErrorCode->setStub(__DIR__ . '/stubs/error-code.stub');
        try {
            $mergeErrorCode->generate();
            $this->line('created successfully.', 'info');
        } catch (Throwable $exception) {
            $this->alert($exception->getMessage());
        }
    }
}
