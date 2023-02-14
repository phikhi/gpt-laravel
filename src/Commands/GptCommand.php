<?php

namespace Galee\Gpt\Commands;

use Illuminate\Console\Command;

class GptCommand extends Command
{
    public $signature = 'gpt-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
