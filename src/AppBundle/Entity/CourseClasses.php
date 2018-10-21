<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * CourseClasses
 *
 * @ORM\Table(name="course_classes", indexes={@ORM\Index(name="id_course", columns={"id_course"}), @ORM\Index(name="id_class", columns={"id_class"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\courseClassesRepository")
 */
class CourseClasses
{   
    /**
     * @ORM\OneToMany(targetEntity="BookingInfo", mappedBy="idCourseClasses", cascade={"all"}, orphanRemoval=true)
     * @Groups({"public"})
    */
    protected $bookingInfo; 

    function __construct()
    {
     $this->bookingInfo = new ArrayCollection();
    }
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
     * @ORM\Column(name="day_number", type="integer", nullable=false)
     * @Groups({"private"})
     */
    private $dayNumber;

    /**
     * @var \AppBundle\Entity\Courses
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Courses", inversedBy="courseClasses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_course", referencedColumnName="id")
     * })
     */
    private $idCourse;

    /**
     * @var \AppBundle\Entity\Dclasses
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dclasses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_class", referencedColumnName="id")
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
     * Set dayNumber
     *
     * @param boolean $dayNumber
     *
     * @return CourseClasses
     */
    public function setDayNumber($dayNumber)
    {
        $this->dayNumber = $dayNumber;

        return $this;
    }

    /**
     * Get dayNumber
     *
     * @return boolean
     */
    public function getDayNumber()
    {
        return $this->dayNumber;
    }

    /**
     * Set idCourse
     *
     * @param \AppBundle\Entity\Courses $idCourse
     *
     * @return CourseClasses
     */
    public function setIdCourse(\AppBundle\Entity\Courses $idCourse = null)
    {
        $this->idCourse = $idCourse;

        return $this;
    }

    /**
     * Get idCourse
     *
     * @return \AppBundle\Entity\Courses
     */
    public function getIdCourse()
    {
        return $this->idCourse;
    }

    /**
     * Set idClass
     *
     * @param \AppBundle\Entity\Dclasses $idClass
     *
     * @return CourseClasses
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
/*    public function __toString()
    {
        return $this->idClass;
    }*/

    /**
     * Add bookingInfo
     *
     * @param \AppBundle\Entity\BookingInfo $bookingInfo
     *
     * @return CourseClasses
     */
    public function addBookingInfo(\AppBundle\Entity\BookingInfo $bookingInfo)
    {
        $this->bookingInfo[] = $bookingInfo;

        return $this;
    }

    /**
     * Remove bookingInfo
     *
     * @param \AppBundle\Entity\BookingInfo $bookingInfo
     */
    public function removeBookingInfo(\AppBundle\Entity\BookingInfo $bookingInfo)
    {
        $this->bookingInfo->removeElement($bookingInfo);
    }

    /**
     * Get bookingInfo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBookingInfo()
    {
        return $this->bookingInfo;
    }
}
