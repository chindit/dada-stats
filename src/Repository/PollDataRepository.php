<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\PollData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PollData|null find($id, $lockMode = null, $lockVersion = null)
 * @method PollData|null findOneBy(array $criteria, array $orderBy = null)
 * @method PollData[]    findAll()
 * @method PollData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PollDataRepository extends ServiceEntityRepository
{
	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, PollData::class);
	}

	public function findAllAvailableDataType(): array
	{
		return $this->createQueryBuilder('pd')
			->select('pd.name', 'pd.category')
			->distinct()
			->getQuery()
			->getArrayResult();
	}
}
