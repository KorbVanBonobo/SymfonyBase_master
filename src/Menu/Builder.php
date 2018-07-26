<?php 

namespace App\Menu;

use Knp\Menu\FactoryInterface;

class Builder
{
    private $factory;
    private $tokenStorage;

    public function __construct(FactoryInterface $factory, $tokenStorage = null)
    {
        $this->factory = $factory;
        $this->tokenStorage = $tokenStorage;
    }

    public function createAdminMenu()
    {   
        $menu = $this->factory->createItem('root');

        return $menu;
    }

    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root');

        return $menu;
    }

    public function createUserMenu()
    {
        $user = $this->tokenStorage->getToken()->getUser();
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'navbar-nav');
        $parent = $menu
            ->addChild($user->getUsername(), ['uri' => '#'])
            ->setExtra('translation_domain', false)
        ;
        $parent->addChild('logout', ['route' => 'fos_user_security_logout']);
        return $menu;
    }
}