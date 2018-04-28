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

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array  $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getInstance();

        switch (count($args)) {
            case 0:
                return $instance->{$method}();

            case 1:
                return $instance->{$method}($args[0]);

            case 2:
                return $instance->{$method}($args[0], $args[1]);

            case 3:
                return $instance->{$method}($args[0], $args[1], $args[2]);

            case 4:
                return $instance->{$method}($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array([$instance, $method], $args);
        }
    }
}
