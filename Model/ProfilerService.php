<?php
declare(strict_types=1);

namespace Triplewood\Toolbox\Model;

use Magento\Framework\Profiler;
use Magento\Developer\Console\Command\ProfilerEnableCommand;
use Magento\Framework\Filesystem\Io\File;

class ProfilerService
{
    public function __construct(
        private readonly File $filesystem,
    ) {
    }

    public function enable(): void
    {
        if (!Profiler::isEnabled()) {
            // enable the Magento profiler
            $this->filesystem->write(BP . '/' . ProfilerEnableCommand::PROFILER_FLAG_FILE, 'csvfile');
            Profiler::enable();
        }
    }
}
