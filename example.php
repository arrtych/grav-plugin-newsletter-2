<?php
namespace Grav\Plugin;
use \Grav\Common\Plugin;
use Grav\Common\Twig\Twig;
use RocketTheme\Toolbox\Event\Event;

class ExamplePlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'onTwigExtensions' => ['onTwigExtensions', 0],
			'onFormProcessed' => ['onFormProcessed', 0]
        ];
    }
    public function onTwigExtensions()
    {
        require_once(__DIR__ . '/twig/ExampleTwigExtension.php');
        $this->grav['twig']->twig->addExtension(new ExampleTwigExtension());
    }
	public function onFormProcessed(Event $event)
	{
        $form = $event['form'];
        $action = $event['action'];
        $params = $event['params'];
		                $vars = array(
                    'form' => $form
                );
		print_r($vars);
		
        switch ($action) {
            case 'email':
				$myfile = fopen("cont.txt", "a") or die("Unable to open file!");
				$txt = "John Doek\r\n";
				fwrite($myfile,$txt);
				print_r($form);
				// $txt = "Jane Doe\n";
				// fwrite($myfile, $txt);
				fclose($myfile);
        }		
		
		
	
	}
}