<?php

declare(strict_types=1);

namespace Vaalyn\HsbRc3\Controller;

use Psr\Http\Message\ResponseInterface;
use Slim\Flash;
use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Slim\Views\Twig;
use Vaalyn\HsbRc3\Utility\CodeTypeResolver;
use Vaalyn\HsbRc3\Utility\PaletteResolver;

class IndexController
{
    protected Flash\Messages $flashMessages;

    public function __construct(Flash\Messages $flashMessages)
    {
        $this->flashMessages = $flashMessages;
    }

    public function __invoke(
        ServerRequest $request,
        Response $response,
        array $args
    ): ResponseInterface {
        $codeType = CodeTypeResolver::getCodeTypeForType($args['type']);
        $palette = PaletteResolver::getPaletteForCodeType($codeType);

        $twig = Twig::fromRequest($request);

        return $twig->render(
            $response,
            'index.html.twig',
            [
                'palette' => $palette,
                'type' => $args['type'],
                'messages' => $this->flashMessages->getMessages(),
            ]
        );
    }
}
