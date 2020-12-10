<?php

declare(strict_types=1);

namespace Vaalyn\HsbRc3\Controller;

use Psr\Http\Message\ResponseInterface;
use Slim\Flash;
use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Vaalyn\HsbRc3\Utility\CodeTypeResolver;
use Vaalyn\HsbRc3\Validator\CodeValidator;

class CodeController
{
    protected Flash\Messages $flashMessages;
    protected CodeValidator $codeValidator;

    public function __construct(
        Flash\Messages $flashMessages,
        CodeValidator $codeValidator
    ) {
        $this->flashMessages = $flashMessages;
        $this->codeValidator = $codeValidator;
    }

    public function __invoke(
        ServerRequest $request,
        Response $response,
        array $args
    ): ResponseInterface {
        $parameters = $request->getParsedBody();

        $code = $parameters['code'] ?? null;
        $type = $parameters['type'] ?? '';

        if ($code === null) {
            $this->flashMessages->addMessage('Fehler', 'Gib bitte einen Code ein');

            return $response->withRedirect('/' . $type, 307);
        }

        $codeType = CodeTypeResolver::getCodeTypeForType($type);

        if (!$this->codeValidator->validate($code, $codeType)) {
            return $response->withRedirect('/' . $type, 307);
        }

        return $response->withRedirect(
            $_ENV['RC3_SUCCESS_LINK'],
            307
        );
    }
}
