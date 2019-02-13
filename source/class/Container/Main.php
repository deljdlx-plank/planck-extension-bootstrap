<?php

namespace Planck\Extension\Bootstrap\Container;


use Planck\Container;
use Planck\Tool\Encrypt;
use Planck\View\ComponentManager;

class Main extends Container
{

    public function initialize()
    {
        $this->set('i18n-engine', function() {
            return new \Planck\Extension\Tool\Helper\I18n();
        });



        $this->set('encrypt-engine', function() {
            $engine = new Encrypt('5c3896c974748', '5c3896c974b30');
            return $engine;
        });

        $this->set('view-component-manager', function() {
            $manager = new ComponentManager();
            return $manager;
        });


        $this->set('resource-loader-url', '?/tool/api-get-resource');




        $this->set('css-loader-url', '?/tool/api-get-css');
        $this->set('javascript-loader-url', '?/tool/api-get-javascript');


        $this->set('extension-javascript-loader-url', '?/tool/asset/api/get-extension-javascript');
        $this->set('extension-css-loader-url', '?/tool/asset/api/get-extension-css');




    }

}
