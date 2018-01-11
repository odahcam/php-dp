<?php

namespace Odahcam\DP; // Design Patterns

/**
 * Singleton pattern.
 *
 * @author Luiz Barni
 */
abstract class AbstractSingleton
{
    /**
     * The stored instance.
     * @var object $instance A instância única dessa classe.
     */
    protected static $instance = null;

    /**
     * Retorna uma instância única de uma classe.
     *
     * @author Luiz Barni - odahcam.com
     *
     * @param BootstrapperInterface $bootstrapper
     *
     * @return static
     */
    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Construtor do tipo protegido previne que uma nova instância da
     * Classe seja criada através do operador `new` de fora dessa classe.
     */
    protected function __construct() {}

    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe.
     *
     * @author Patrick Forget - http://geekpad.ca
     * @author Luiz Barni
     */
    final private function __clone() {}

    /**
     * Método unserialize do tipo privado para prevenir a desserialização
     * da instância dessa classe.
     */
    final private function __wakeup() : void {}
}
