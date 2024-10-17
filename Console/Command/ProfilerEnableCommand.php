<?php
declare(strict_types=1);

namespace Triplewood\Toolbox\Console\Command;

use Magento\Framework\Exception\LocalizedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Triplewood\Toolbox\Model\ProfilerService;

class ProfilerEnableCommand extends Command
{
    private const NAME = 'name';

    public function __construct(
        private readonly ProfilerService $profilerService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('triplewood:profiler:enable');
        $this->setDescription('This enables the extended profiling capabilities of the Triplewood profile.');
        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $exitCode = 0;

        $output->writeln('<comment>' .
            '| NOTE: Enabling the Triplewood profiler changes some files in the core that cannot be changed ' . PHP_EOL .
            '| through other means like overrides or plugins. Those changes can be reverted by using triplewood:profile:disable. ' . PHP_EOL .
            '| It is possible that they can be accidentally reverted by composer, too. Be careful! </comment>');
        $output->writeln('<info>Enabling Triplewood profiler.</info>');

        $this->profilerService->enable();

        return $exitCode;
    }
}
