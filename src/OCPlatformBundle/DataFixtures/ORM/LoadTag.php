<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadTag.php

namespace OCPlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OCPlatformBundle\Entity\Tag;

class LoadTag implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $names = array(
      'Développement web',
      'Développement mobile',
      'Graphisme',
      'Intégration',
      'Réseau',
      'Machine Learning',
      'DevOps'
    );

    foreach ($names as $name) {
      // On crée la catégorie
      $tag = new Tag();
      $tag->setName($name);

      // On la persiste
      $manager->persist($tag);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}
