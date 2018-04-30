<?php

namespace Odahcam\DP; // Design Patterns

/**
 * Singleton pattern.
 */
interface SingletonInterface
{
    /**
     * The stored instance.
     * 
     * @var object $instance A instância única dessa classe.
     */
    // protected static $instance = null;

    /**
     * Retorna uma instância única de uma classe.
     *
     * @return static
     */
    static function getInstance(): self;

    /**
     * Construtor do tipo protegido previne que uma nova instância da
     * Classe seja criada através do operador `new` de fora dessa classe.
     */
    function __construct(): void;

    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe.
     */
    function __clone(): void;

    /**
     * Método unserialize do tipo privado para prevenir a desserialização
     * da instância dessa classe.
     */
    function __wakeup() : void;
}
