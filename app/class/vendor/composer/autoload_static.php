<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit16e6cc526c536e38804d2aa8a9e5bda5
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\Stdlib\\' => 12,
            'Zend\\Escaper\\' => 13,
        ),
        'P' => 
        array (
            'PhpOffice\\PhpWord\\' => 18,
            'PhpOffice\\Common\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\Stdlib\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-stdlib/src',
        ),
        'Zend\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-escaper/src',
        ),
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpword/src/PhpWord',
        ),
        'PhpOffice\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/common/src/Common',
        ),
    );

    public static $classMap = array (
        'PclZip' => __DIR__ . '/..' . '/pclzip/pclzip/pclzip.lib.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit16e6cc526c536e38804d2aa8a9e5bda5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit16e6cc526c536e38804d2aa8a9e5bda5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit16e6cc526c536e38804d2aa8a9e5bda5::$classMap;

        }, null, ClassLoader::class);
    }
}