<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instructors
 *
 * @ORM\Table(name="instructors", indexes={@ORM\Index(name="instr_name", columns={"instr_name"})})
 * @ORM\Entity
 */
class Instructor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="instr_name", type="string", length=100, nullable=false)
     */
    private $instrName;



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
     * Set instrName
     *
     * @param string $instrName
     *
     * @return Instructor
     */
    public function setInstrName($instrName)
    {
        $this->instrName = $instrName;

        return $this;
    }

    /**
     * Get instrName
     *
     * @return string
     */
    public function getInstrName()
    {
        return $this->instrName;
    }

    public function __toString()
    {
        return $this->instrName;
    }
}
