<?php

declare(strict_types=1);

return [
    Slim\Flash\Messages::class => function() {
        return new Slim\Flash\Messages();
    },

    Slim\Views\Twig::class => function() {
        $twig = Slim\Views\Twig::create(
            __DIR__ . '/../templates',
            //['cache' => __DIR__ . '/../var/cache']
            ['debug' => true]
        );

        $twig->addExtension(new \Twig\Extension\DebugExtension());

        return $twig;
    },

    Vaalyn\HsbRc3\Validator\CodeValidator::class => function(
        Slim\Flash\Messages $flashMessages
    ) {
        return new Vaalyn\HsbRc3\Validator\CodeValidator(
            __DIR__ . '/../data/rC3 Codes.csv',
            $flashMessages
        );
    }
];
