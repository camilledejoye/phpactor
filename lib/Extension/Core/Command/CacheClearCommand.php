<?php

namespace Phpactor\Extension\Core\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Phpactor\Extension\Core\Application\CacheClear;

class CacheClearCommand extends Command
{
    private $cache;

    public function __construct(CacheClear $cache)
    {
        parent::__construct();
        $this->cache = $cache;
    }

    protected function configure()
    {
        $this->setDescription('Clear the cache');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->cache->clearCache();
        $output->writeln(sprintf('<info>Cache cleared: </>%s', $this->cache->cachePath()));

        return 0;
    }
}
