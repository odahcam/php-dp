<?php

declare(strict_types=1);

namespace Odahcam\DP\Exception;

/**
 * Exception to say that the inside property was not defined.
 */
class UndefinedAdaptProperty extends \Exception
{
    /**
     * Mensagem da Exceção.
     */
    protected $message = 'Property static::$adapt is not defined!';
}
