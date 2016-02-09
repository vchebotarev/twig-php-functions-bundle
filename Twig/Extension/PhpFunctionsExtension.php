<?php

namespace Chebur\TwigPhpFunctionsBundle\Twig\Extension;

use Twig_Extension;
use Twig_SimpleFunction;

class PhpFunctionsExtension extends Twig_Extension
{
    /**
     * Function name
     * @var string
     */
    protected $function_name;

    /**
     * @var array
     */
    protected $functions = array(
        //todo добавить функций + сделать поддержку опций для каждой + разделить на группы
        //todo сделать возможным добавлять интересующие функции через конфиг, чтобы не захламлять память
    );

    /**
     * @param string $function_name
     */
    public function __construct($function_name)
    {
        $this->function_name = $function_name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chebur_php_functions_extension';
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        //todo проверить на вызов статических методов классов
        $functions = array(
            new Twig_SimpleFunction($this->function_name, array($this, 'callPhpFunction'), array('is_safe' => array('all'))),
        );

        /*
        foreach($this->functions as $function ) {
            $functions[] = new \Twig_SimpleFunction($function, $function, array('is_safe' => array('all')));
        }
        */

        return $functions;
    }

    public function callPhpFunction()
    {
        $function_name = func_get_arg(0);
        $function_args = func_get_args();
        unset($function_args[0]);

        return call_user_func_array($function_name, $function_args);
    }

    /**
     * @return array
     */
    public function getTests()
    {
        return array( //todo
            //new Twig_SimpleFunction('instanceof', function($instance, $class){ return $instance instanceof $class; }),
        );
    }

}
