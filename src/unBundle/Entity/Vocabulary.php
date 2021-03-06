<?php

namespace unBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vocabulary
 *
 * @ORM\Table(name="vocabulary")
 * @ORM\Entity
 */
class Vocabulary
{
    /**
     * @var string
     *
     * @ORM\Column(name="french", type="text", nullable=false)
     */
    private $french;

    /**
     * @var string
     *
     * @ORM\Column(name="german", type="text", nullable=false)
     */
    private $german;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



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

    /**
     * Set slug
     *
     * @param string $slug
     * @return Vocabulary
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
