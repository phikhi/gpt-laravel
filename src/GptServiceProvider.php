<?php

namespace Galee\Gpt;

use Galee\Gpt\Commands\GptCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GptServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('gpt-laravel')
            ->hasConfigFile()
            // ->hasViews()
            // ->hasMigration('create_gpt-laravel_table')
            // ->hasCommand(GptCommand::class)
;
    }
}
