<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * ClassSched
 *
 * @ORM\Table(name="class_sched", indexes={@ORM\Index(name="id_class", columns={"id_class"})})
 * @ORM\Entity
 */
class ClassSched
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
     * @var boolean
     *
     * @ORM\Column(name="week_day", type="integer", nullable=false)
     */
    private $weekDay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="time", nullable=false)
     */
    private $startTime;

    /**
     * @var \AppBundle\Entity\Dclasses
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dclasses", inversedBy="classSched")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_class", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $idClass;



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
     * Set weekDay
     *
     * @param boolean $weekDay
     *
     * @return ClassSched
     */
    public function setWeekDay($weekDay)
    {
        $this->weekDay = $weekDay;

        return $this;
    }

    /**
     * Get weekDay
     *
     * @return boolean
     */
    public function getWeekDay()
    {
        return $this->weekDay;
    }

    public function getWeekDayString()
    {
        return jddayofweek($this->weekDay-1, 1);
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return ClassSched
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set idClass
     *
     * @param \AppBundle\Entity\Dclasses $idClass
     *
     * @return ClassSched
     */
    public function setIdClass(\AppBundle\Entity\Dclasses $idClass = null)
    {
        $this->idClass = $idClass;

        return $this;
    }

    /**
     * Get idClass
     *
     * @return \AppBundle\Entity\Dclasses
     */
    public function getIdClass()
    {
        return $this->idClass;
    }

   /* public function __toString()
    {
        return ($this->getWeekDay() ?: '' . $this->getStartTime() ?: '');
    }*/
}
