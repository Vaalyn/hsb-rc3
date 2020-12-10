<?php

declare(strict_types=1);

namespace Vaalyn\HsbRc3\Utility;

class CodeTypeResolver
{
    public static function getCodeTypeForType(string $type): string
    {
        $violetType = $_ENV['RC3_TYPE_VIOLET'];
        $pinkType = $_ENV['RC3_TYPE_PINK'];
        $blueType = $_ENV['RC3_TYPE_BLUE'];
        $turquiseType = $_ENV['RC3_TYPE_TURQUISE'];
        $redType = $_ENV['RC3_TYPE_RED'];

        switch ($type) {
            case $violetType:
                return 'Violet';

            case $pinkType:
                return 'Pink';

            case $blueType:
                return 'Blau';

            case $turquiseType:
                return 'Türkis';

            case $redType:
                return 'Rot';
        }

        return '';
    }
}
