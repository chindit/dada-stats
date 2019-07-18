<?php

namespace App\Services;

use App\Repository\PollDataRepository;

class PollDataService
{
	/**
	 * @var PollDataRepository
	 */
	private $pollDataRepository;

	public function __construct(PollDataRepository $pollDataRepository)
	{
		$this->pollDataRepository = $pollDataRepository;
	}

	/**
	 * @return string[]
	 */
	public function getPollDataTypeList(): array
	{
		$databaseTypes = $this->pollDataRepository->findAllAvailableDataType();

		$typesByCategories = [];

		foreach ($databaseTypes as $databaseType)
		{
			$typesByCategories[$databaseType['category']][$databaseType['name']] = $databaseType['name'];
		}

		return $typesByCategories;
	}
}
