<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a4f36f586d84edca42a53bd19dc6c20
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DB\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DB\\' => 
        array (
            0 => __DIR__ . '/..' . '/rifacls/src/DB',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a4f36f586d84edca42a53bd19dc6c20::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a4f36f586d84edca42a53bd19dc6c20::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0a4f36f586d84edca42a53bd19dc6c20::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit0a4f36f586d84edca42a53bd19dc6c20::$classMap;

        }, null, ClassLoader::class);
    }
}
