<?php

namespace OCPlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdvertRepository extends EntityRepository
{
  public function getPublishedQueryBuilder()
  {
    return $this
      ->createQueryBuilder('a')
      ->where('a.published = :published')
      ->setParameter('published', true)
    ;
  }
}
