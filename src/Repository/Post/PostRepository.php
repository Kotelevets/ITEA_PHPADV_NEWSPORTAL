<?php

namespace App\Repository\Post;

use App\Dto\Category;
use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findAllWithCategories()
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.category', 'c')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findPublished()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.publicationDate is not NULL')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByCategory($category)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.publicationDate is not NULL and p.category = :category')
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult()
            ;
    }
}
