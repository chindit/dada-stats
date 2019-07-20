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
			->select('pd.name', 'pd.category', 'pd.key')
			->distinct()
			->getQuery()
			->getArrayResult();
	}

    /**
     * @param \DateTimeImmutable $lowerLimit
     * @param array $types
     * @return PollData[]
     */
	public function getChartData(\DateTimeImmutable $lowerLimit, array $types): array
    {
        return $this->createQueryBuilder('pd')
            ->where('pd.key IN(:types)')
            ->andWhere('pd.date > :lowerLimit')
            ->setParameter('types', $types)
            ->setParameter('lowerLimit', $lowerLimit)
            ->orderBy('pd.id', 'ASC')
            ->getQuery()
            ->getReSult();
    }
}
