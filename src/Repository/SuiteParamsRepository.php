<?php

namespace App\Repository;


use App\Entity\SuiteParams;
use Doctrine\ORM\EntityRepository;

/**
 * @method SuiteParams|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuiteParams|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuiteParams[]    findAll()
 * @method SuiteParams[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuiteParamsRepository extends EntityRepository
{
}
