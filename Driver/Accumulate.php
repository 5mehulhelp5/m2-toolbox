<?php
declare(strict_types=1);

namespace Triplewood\Toolbox\Driver;

use Magento\Framework\Profiler\Driver\Standard;

class Accumulate extends Standard
{

    public function stop($timerId)
    {
        try {
            //parent::stop($timerId);
        } catch (\Exception $e) {
            // gracefully ignore stops to timers that do not exist
        }
    }
}
