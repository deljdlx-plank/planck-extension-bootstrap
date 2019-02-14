<?php

namespace Planck\Extension\Bootstrap;


use Planck\Extension\Bootstrap\Router\Extension as ExtensionRouter;
use Planck\ExtensionLoader;

class Application extends \Planck\Application\Application
{




    public function initialize()
    {
        parent::initialize();

        $this->addRouter(
            new ExtensionRouter(),
            ExtensionRouter::class
        );

        return $this;
    }


}