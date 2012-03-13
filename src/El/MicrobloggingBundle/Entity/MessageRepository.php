<?php

namespace El\MicrobloggingBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MessageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends EntityRepository
{

    public function getMessagesByUserId($limit, $userId)
    {
        $qb = $this->createQueryBuilder('m')
        ->select('m, u')
        ->leftJoin('m.user', 'u')
        ->where('u.id = :userid')
        ->setParameter('userid', $userId)
        ->addOrderBy('m.created', 'DESC');

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
                        ->getResult();
    }

}