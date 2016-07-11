<?php
namespace Grav\Plugin;
class ExampleTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'ExampleTwigExtension';
    }
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('example', [$this, 'exampleFunction']),
			new \Twig_SimpleFunction('getFame',[$this,'getFame'])
			
        ];
    }
    public function exampleFunction()
    {
        return 'The plugin installed!';
    }
	public function getFame(){
		return "Welcome to ";
	}
}