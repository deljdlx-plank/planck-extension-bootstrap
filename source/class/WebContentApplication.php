<?php

namespace Planck\Extension\Bootstrap;


use Planck\Extension\Bootstrap\Router\Extension as ExtensionRouter;
use Planck\ExtensionLoader;

abstract class WebContentApplication extends WebApplication
{


    public function __construct($path = null, $instanceName = null, $autobuild = true)
    {
        parent::__construct($path, $instanceName, $autobuild);

        $this->addExtension(\Planck\Extension\EntityEditor::class, '?');
        $this->addExtension(\Planck\Extension\FormComponent::class, '?');
        $this->addExtension(\Planck\Extension\Navigation::class, '?');
        $this->addExtension(\Planck\Extension\StatusManager::class, '?');
        $this->addExtension(\Planck\Extension\RichTag::class, '?');
        $this->addExtension(\Planck\Extension\Content::class, '?');
        $this->addExtension(\Planck\Extension\CMS::class, '?');

    }


}