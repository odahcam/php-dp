<?php

namespace Odahcam\DP;

abstract class AbstractFacade extends AbstractSingleton
{
    /**
     * Who is this class faking for, full qualifyied className.
     *
     * @var string
     */
    protected static $fakingFor;

    /**
     * {@inheritDoc}
     */
    public function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static::$fakingFor;
        }

        return static::$instance;
    }
}
