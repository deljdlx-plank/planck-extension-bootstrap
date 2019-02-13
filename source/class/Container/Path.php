<?php

namespace Planck\Extension\Bootstrap\Container;


use Planck\Container;


class Path extends Container
{

    public function initialize()
    {

        $this->set('data-filepath-root', function () {
            return $this->get('filepath-root').'/data';
        });

        //=======================================================
        $this->set('lang-filepath-root', function () {
            return $this->get('data-filepath-root').'/lang';
        });


        $this->set('default-lang', function () {
            return '__default';
        });

        //=======================================================



        $this->set('public-filepath-root', function () {
            return $this->get('filepath-root').'/public';
        });

        $this->set('public-vendor-url-root', function () {
            return 'vendor/';
        });


        $this->set('user-data-filepath-root', function ($absolute = true) {

            if(!$absolute) {
                return './www/data';
            }
            return $this->get('filepath-root').'/www/data';
        });



        $this->set('user-data-url-root', function ($absolute = true) {
            if(!$absolute) {
                return './data';
            }
            return $this->get('url-root').'/data';
        });
        //=======================================================
    }

}
