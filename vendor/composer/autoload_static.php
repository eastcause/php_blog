<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit203e3e3f0ca0231f69b21f50347b5981
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit203e3e3f0ca0231f69b21f50347b5981::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit203e3e3f0ca0231f69b21f50347b5981::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit203e3e3f0ca0231f69b21f50347b5981::$classMap;

        }, null, ClassLoader::class);
    }
}
