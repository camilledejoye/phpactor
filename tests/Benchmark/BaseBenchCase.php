<?php

namespace Phpactor\Tests\Benchmark;

use Phpactor\Tests\IntegrationTestCase;
use Symfony\Component\Process\Process;

class BaseBenchCase extends IntegrationTestCase
{
    protected function runCommand(string $command, string $stdin = null): string
    {
        chdir($this->workspaceDir());

        $process = new Process(__DIR__ . '/../../bin/phpactor ' . $command);
        $process->setInput($stdin);
        $process->setWorkingDirectory($this->workspaceDir());
        $process->run();
        return $process->getOutput();
    }
}
