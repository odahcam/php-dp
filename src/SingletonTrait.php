<?php

namespace Odahcam\DP; // Design Patterns

/**
 * Singleton pattern.
 */
trait SingletonTrait
{
    /**
     * The stored instance.
     * 
     * @var object $instance A instância única dessa classe.
     */
    protected static $instance = null;

    /**
     * Creates a new instance of static.
     */
    private static function createNewInstance(): self
    {
        return new static;
    }

    /**
     * Retorna uma instância única de uma classe.
     *
     * @return static
     */
    public static function getInstance()/*: self */
    {
        if (static::$instance === null) {
            static::$instance = static::createNewInstance();
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
    final private function __wakeup(): void {}

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param string  $method
     * @param array   $args
     */
    public static function __callStatic(string $method, array $args = null)
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
