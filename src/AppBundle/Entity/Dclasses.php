<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Dclasses
 *
 * @ORM\Table(name="dclasses")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\dclassesRepository")
 */
class Dclasses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"private"})

     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="ClassSched", mappedBy="idClass", cascade={"all"}, orphanRemoval=true)
    */
    protected $classSched;
     
    function __construct()
    {
     $this->classSched = new ArrayCollection();
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     * @Groups({"private"})     
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Groups({"private"})
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="spots", type="smallint", nullable=false)
     */
    private $spots;



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
     * Set title
     *
     * @param string $title
     *
     * @return Dclasses
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Dclasses
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set spots
     *
     * @param integer $spots
     *
     * @return Dclasses
     */
    public function setSpots($spots)
    {
        $this->spots = $spots;

        return $this;
    }

    /**
     * Get spots
     *
     * @return integer
     */
    public function getSpots()
    {
        return $this->spots;
    }

    /**
     * Add classSched
     *
     * @param \AppBundle\Entity\ClassSched $classSched
     *
     * @return Dclasses
     */
    public function addClassSched(\AppBundle\Entity\ClassSched $classSched)
    {
        $this->classSched[] = $classSched;

        return $this;
    }

    /**
     * Remove classSched
     *
     * @param \AppBundle\Entity\ClassSched $classSched
     */
    public function removeClassSched(\AppBundle\Entity\ClassSched $classSched)
    {
        $this->classSched->removeElement($classSched);
    }

    /**
     * Get classSched
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassSched()
    {
        return $this->classSched;
    }

    public function __toString()
    {
        return $this->getTitle() ?: '';
    }

}
