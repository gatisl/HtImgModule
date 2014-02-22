<?php
namespace HtImgModule;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'HtImg\ModuleOptions' => 'HtImgModule\Factory\ModuleOptionsFactory',
                'HtImg\Imagine' => 'HtImgModule\Factory\ImagineFactory',
                'HtImg\RelativePathResolver' => 'HtImgModule\Factory\RelativePathResolverFactory',
                'HtImg\UrlProvider' => 'HtImgModule\Factory\ImgUrlProviderFactory',
                'HtImg\ImageService' => 'HtImgModule\Factory\ImageServiceFactory',
            ]
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'factories' => [
                'HtImgModule\View\Helper\ImgUrl' => 'HtImgModule\View\Helper\Factory\ImgUrlFactory',
            ],
            'invokables' => [
                'HtImgModule\View\Helper\DisplayImage' => 'HtImgModule\View\Helper\Factory\DisplayImage',
            ],
            'aliases' => [
                'htDisplayImage' => 'HtImgModule\View\Helper\DisplayImage',
                'htImgUrl' => 'HtImgModule\View\Helper\ImgUrl',
            ]
        ]
    }
}
