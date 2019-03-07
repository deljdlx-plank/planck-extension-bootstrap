<?php


namespace Planck\Extension\Bootstrap\Router;

use Planck\Helper\StringUtil;
use Planck\Routing\Route;
use Planck\Routing\Router;

class Extension extends Router
{

    public function registerRoutes()
    {
        parent::registerRoutes();

        $this->all('extension-route', '`/@extension/([\w\-]+)/([\w\-]+)/([\w\-]+)\[(.*?)]`', function($extensionName = null, $moduleName = null, $routerName = null, $routeName = null) {


            if($extensionName) {

                $normalizedExtensionName = StringUtil::separatedToClassName(
                    $extensionName
                );
                $normalizedExtensionName = StringUtil::toCamelCase(
                    $normalizedExtensionName, '_'
                );



                $extension = $this->getApplication()->getExtension($normalizedExtensionName);

                $normalizedModuleName = StringUtil::separatedToClassName(
                    $moduleName
                );
                $normalizedModuleName = StringUtil::toCamelCase(
                    $normalizedModuleName, '_'
                );

                $module = $extension->getModule($normalizedModuleName);

                $router =$module->getRouter($routerName);
                $route = $router ->getRouteByName($routeName);

                $headers = $route->getHeaders();
                foreach ($headers as $key => $header) {
                    $this->addHeader($header);
                }


                $returnValue = $route->execute();
                echo $route->getOutput();

                return $returnValue;
            }

        })
        ->setBuilder(function(Route $route) {

            if($route->getRouter()->hasExtension()) {
                $extension = $route->getRouter()->getExtension();
                $extensionPath = strtolower(StringUtil::namespaceToSeparated($extension->getNamespaceName()));
                $extensionName = StringUtil::camelCaseToSeparated($extension->getBaseName(), '_');

                $module = StringUtil::camelCaseToSeparated($route->getRouter()->getModuleName());

                $routerPath = StringUtil::camelCaseToSeparated(StringUtil::getClassBaseName($route->getRouter()));
                return '/@extension/'.$extensionPath.'-'.$extensionName.'/'.$module.'/'.$routerPath.'['.$route->getName().']';
            }




        })
        ;



    }

}

