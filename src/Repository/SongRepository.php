<?php

namespace App\Repository;

use App\Entity\Song;
use App\Entity\SongSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Song|null find($id, $lockMode = null, $lockVersion = null)
 * @method Song|null findOneBy(array $criteria, array $orderBy = null)
 * @method Song[]    findAll()
 * @method Song[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SongRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Song::class);
    }

    /**
     * @param SongSearch $search
     * @param $value
     * @return Query
     */
    public function findAllVisibleQuery(SongSearch $search, $value): Query
    {
//        dump($search);
        $query = $this->findVisibleQuery();

        if ($search->getStyles()->count() > 0)
        {

            foreach ($search->getStyles() as $key=>$style)
            {
                $query = $query
                    -> andWhere(":style$key MEMBER OF song.styles")
                    -> setParameter("style$key", $style);
            }
        }

        if ($search->getTitles())
        {
//            $value ="ea";

            $query = $query
                ->andWhere('song.name LIKE :val')
                ->setParameter('val', "%".$value."%")
                ->orderBy('song.id', 'ASC')
                ;
        }
            return $query
                ->getQuery();
    }

    /**
     * @return Song[]
     */
    public function findLatest(): array
    {
        return $this->findVisibleQuery()
//            ->addSelect('styles, artists')
//            ->innerJoin('song.artists', 'artists')
//            ->innerJoin('song.styles', 'styles')
            ->setMaxResults(3)
            ->orderBy('song.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return QueryBuilder
     */
    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('song');

    }

//    /**
//     * @return Song[] Returns an array of Song objects
//     */
//
//    public function findByExampleField($value)
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }


    /*
    public function findOneBySomeField($value): ?Song
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}

