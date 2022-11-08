<?php

namespace Fidelite\Calendly;

use Illuminate\Support\Facades\Facade;

/**
 * Class Calendly
 *
 * @package Fidelite\Calendly
 * @see \Fidelite\Calendly\CalendlyAPI
 */
class Calendly extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'calendly';
    }
}
