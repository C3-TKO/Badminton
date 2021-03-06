<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use PDO;

/**
 * RoundRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RoundRepository extends EntityRepository
{
    public function findLatestId()
    {
        $sql = "SELECT id FROM round ORDER BY date DESC LIMIT 1";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();
        $ids = $stmt->fetch();
        return (int) array_pop($ids);
    }
}
