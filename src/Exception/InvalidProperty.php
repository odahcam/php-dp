<?php

declare(strict_types=1);

namespace Odahcam\DP\Exception;

/**
 * Exception to say that the inside property was not defined.
 */
class InvalidProperty extends \Exception
{
    /**
     * Mensagem da Exceção.
     */
    protected $message = 'Property is not valid!';
}
