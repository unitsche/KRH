<?php

namespace unBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{
    public function findAllOrderedByDueDate()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT t FROM unBundle:Task t ORDER BY t.dueDate ASC'
            )
            ->getResult();
    }	
}
