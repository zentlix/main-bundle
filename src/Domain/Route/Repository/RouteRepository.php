<?php

/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Zentlix to newer
 * versions in the future. If you wish to customize Zentlix for your
 * needs please refer to https://docs.zentlix.io for more information.
 */

declare(strict_types=1);

namespace Zentlix\MainBundle\Domain\Route\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Zentlix\MainBundle\Domain\Route\Entity\Route;
use Zentlix\MainBundle\Domain\Shared\Repository\GetTrait;

/**
 * @method Route      get($id, $lockMode = null, $lockVersion = null)
 * @method Route|null find($id, $lockMode = null, $lockVersion = null)
 * @method Route|null findOneBy(array $criteria, array $orderBy = null)
 * @method Route[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RouteRepository extends ServiceEntityRepository
{
    use GetTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Route::class);
    }

    /**
     * @param string $path
     * @return Route[]
     */
    public function wherePathLike(string $path)
    {
        $qb = $this->createQueryBuilder('r');

        return $qb
            ->select()
            ->from(Route::class,'route')
            ->where($qb->expr()->like('r.url', ':url'))
            ->setParameter('url', '%' . $path . '%')
            ->getQuery()
            ->execute();
    }
}