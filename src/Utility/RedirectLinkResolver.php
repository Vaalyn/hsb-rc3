<?php

declare(strict_types=1);

namespace Vaalyn\HsbRc3\Utility;

class RedirectLinkResolver
{
    public static function getRedirectLinkForCodeType(string $codeType): string
    {
		$linkViolet = $_ENV['RC3_SUCCESS_LINK_VIOLET'];
        $linkPink = $_ENV['RC3_SUCCESS_LINK_PINK'];
        $linkBlue = $_ENV['RC3_SUCCESS_LINK_BLUE'];
        $linkTurquise = $_ENV['RC3_SUCCESS_LINK_TURQUISE'];
        $linkRed = $_ENV['RC3_SUCCESS_LINK_RED'];

        switch ($codeType) {
            case 'Pink':
                return $linkPink;

            case 'Türkis':
                return $linkTurquise;

            case 'Rot':
                return $linkRed;

            case 'Violet':
                return $linkViolet;

            case 'Blau':
                return $linkBlue;
		}

		return '';
    }
}
