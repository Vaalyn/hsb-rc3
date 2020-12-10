<?php

declare(strict_types=1);

namespace Vaalyn\HsbRc3\Constants;

interface CsvConstants
{
	public const FIELD_NAME_CODE = 'code';
	public const FIELD_NAME_TYPE = 'type';
	public const FIELD_NAME_MESSAGE = 'message';

	public const CSV_FIELD_HEADERS = [
		self::FIELD_NAME_CODE,
		self::FIELD_NAME_TYPE,
		self::FIELD_NAME_MESSAGE,
	];
}
