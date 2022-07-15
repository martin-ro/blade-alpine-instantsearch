<?php

namespace MartinRo\BladeInstantSearch\Facades;

use Illuminate\Support\Facades\Facade;

class BladeInstantSearch extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MartinRo\BladeInstantSearch\BladeInstantSearch::class;
    }
}
