<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5abfa280ffbf6c04a144d30207a8165a
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Workerman\\' => 10,
        ),
        'P' => 
        array (
            'PragmaRX\\Google2FA\\' => 19,
            'ParagonIE\\ConstantTime\\' => 23,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'E' => 
        array (
            'Endroid\\QrCode\\' => 15,
        ),
        'D' => 
        array (
            'DASPRiD\\Enum\\' => 13,
        ),
        'B' => 
        array (
            'BaconQrCode\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Workerman\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/workerman',
        ),
        'PragmaRX\\Google2FA\\' => 
        array (
            0 => __DIR__ . '/..' . '/pragmarx/google2fa/src',
        ),
        'ParagonIE\\ConstantTime\\' => 
        array (
            0 => __DIR__ . '/..' . '/paragonie/constant_time_encoding/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Endroid\\QrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/endroid/qr-code/src',
        ),
        'DASPRiD\\Enum\\' => 
        array (
            0 => __DIR__ . '/..' . '/dasprid/enum/src',
        ),
        'BaconQrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/bacon/bacon-qr-code/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5abfa280ffbf6c04a144d30207a8165a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5abfa280ffbf6c04a144d30207a8165a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5abfa280ffbf6c04a144d30207a8165a::$classMap;

        }, null, ClassLoader::class);
    }
}
