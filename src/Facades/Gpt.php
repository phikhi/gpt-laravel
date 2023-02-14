<?php

namespace Galee\Gpt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Galee\Gpt\Gpt
 */
class Gpt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Galee\Gpt\Gpt::class;
    }
}
