<?php

namespace unBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;


/**
 * Vocabulary
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Vocabulary
{
     use ORMBehaviors\Sluggable\Sluggable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="french", type="text")
     */
    private $french;

    /**
     * @var string
     *
     * @ORM\Column(name="german", type="text")
     */
    private $german;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set french
     *
     * @param string $french
     * @return Vocabulary
     */
    public function setFrench($french)
    {
        $this->french = $french;

        return $this;
    }

    /**
     * Get french
     *
     * @return string 
     */
    public function getFrench()
    {
        return $this->french;
    }

    /**
     * Set german
     *
     * @param string $german
     * @return Vocabulary
     */
    public function setGerman($german)
    {
        $this->german = $german;

        return $this;
    }

    /**
     * Get german
     *
     * @return string 
     */
    public function getGerman()
    {
        return $this->german;
    }

    public function getSluggableFields()
    {
        return [ 'german' ];
    }

    public function generateSlugValue($values)
    {
        return implode('-', $values);
    }

}
