<?php
declare(strict_types=1);

namespace Magento\CommandExample\Console\Command;

use Magento\Framework\Exception\LocalizedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProfilerEnableCommand extends Command
{
    private const NAME = 'name';

    protected function configure(): void
    {
        $this->setName('triplewood:profiler:enable');
        $this->setDescription('This enables the extended profiling capabilities of the Triplewood profile. To make this work, you need to enable the Magento profiler, too!');
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

        $output->writeln('<info>Enabling Triplewood profiler.</info>');
        $output->writeln('<comment>Note: This will actually alter some files in the core that cannot be changed ' .
            'through overrides or plugins. Those changes can be reverted by using triplewood:profile:disable. ' .
            'It is possible that they can be accidentally reverted by composer. Be careful! </comment>');

        try {
            if (rand(0, 1)) {
                throw new LocalizedException(__('An error occurred.'));
            }
        } catch (LocalizedException $e) {
            $output->writeln(sprintf(
                '<error>%s</error>',
                $e->getMessage()
            ));
            $exitCode = 1;
        }

        return $exitCode;
    }
}
