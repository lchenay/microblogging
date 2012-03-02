<?php

namespace El\MicrobloggingBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of Builder
 *
 * @author gcavana
 */
class MenuBuilder
{

    private $factory;

    /**
     *
     * @param FactoryInterface $factory 
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setCurrentUri($request->getRequestUri());

        $menu->addChild('Home', array('route' => 'homepage'));

        return $menu;
    }

}