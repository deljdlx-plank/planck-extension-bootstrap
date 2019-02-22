<?php

namespace Planck\Extension\Bootstrap;


use Planck\Extension\Bootstrap\Router\Extension as ExtensionRouter;
use Planck\ExtensionLoader;

abstract class WebApplication extends \Planck\Application\WebApplication
{


    public function getPublicFilepath()
    {
        return $this->getFilepathRoot().'/www';
    }

    public function getJavascriptFilePath()
    {
        return $this->getTheme()->getFilepath().'/asset/javascript';
    }

    public function getCSSFilePath()
    {
        return $this->getTheme()->getFilepath().'/asset/css';
    }




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