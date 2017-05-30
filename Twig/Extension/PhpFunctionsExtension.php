<?php

namespace Chebur\TwigPhpFunctionsBundle\Twig\Extension;

class PhpFunctionsExtension extends \Twig_Extension
{
    /**
     * Function name
     * @var string
     */
    protected $functionName;

    /**
     * @param string $functionName
     */
    public function __construct($functionName)
    {
        $this->functionName = $functionName;
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
        //todo проверить на вызов статических методов классов + проверить опции
        $functions = array(
            new \Twig_SimpleFunction($this->functionName, array($this, 'callPhpFunction'), array('is_safe' => array('all'))),
        );
        return $functions;
    }

    public function callPhpFunction()
    {
        $function_name = func_get_arg(0);
        $function_args = func_get_args();
        unset($function_args[0]);

        return call_user_func_array($function_name, $function_args);
    }

}
