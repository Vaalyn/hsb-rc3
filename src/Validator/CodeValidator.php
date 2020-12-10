<?php

declare(strict_types=1);

namespace Vaalyn\HsbRc3\Validator;

use Iterator;
use League\Csv\Reader;
use Slim\Flash;
use Vaalyn\HsbRc3\Constants\CsvConstants;

class CodeValidator
{
    protected string $codeListPath;
    protected Flash\Messages $flashMessages;

    public function __construct(
        string $codeListPath,
        Flash\Messages $flashMessages
    ) {
        $this->codeListPath = $codeListPath;
        $this->flashMessages = $flashMessages;
    }

    public function validate(string $code, string $type): bool
    {
        foreach ($this->readCsv() as $row) {
            if ($row[CsvConstants::FIELD_NAME_CODE] !== $code) {
                continue;
            }

            if ($row[CsvConstants::FIELD_NAME_TYPE] !== $type) {
                $this->flashMessages->addMessage(
                    'Hinweis',
                    $row[CsvConstants::FIELD_NAME_MESSAGE]
                );
                return false;
            }

            return true;
        }

        $this->flashMessages->addMessage(
            'Hinweis',
            'Ungültiger Code'
        );

        return false;
    }

    protected function readCsv(): Iterator {
        $csvReader = Reader::createFromPath($this->codeListPath);

        return $csvReader->getRecords(CsvConstants::CSV_FIELD_HEADERS);
    }
}
