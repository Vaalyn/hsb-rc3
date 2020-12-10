<?php

declare(strict_types=1);

namespace Vaalyn\HsbRc3\Utility;

class PaletteResolver
{
    public static function getPaletteForCodeType(string $codeType): string
    {
        switch ($codeType) {
            case 'Pink':
                return '1';

            case 'Türkis':
                return '2';

            case 'Rot':
                return '3';

            case 'Violet':
                return '4';

            case 'Blau':
                return '5';
		}

		return '';
    }
}
