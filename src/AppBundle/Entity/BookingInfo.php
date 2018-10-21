<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * BookingInfo
 *
 * @ORM\Table(name="booking_info", indexes={@ORM\Index(name="id_booking", columns={"id_booking"}), @ORM\Index(name="id_course_classes", columns={"id_course_classes"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\bookingInfoRepository")
 */
class BookingInfo
{   
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="class_date", type="date", nullable=false)
     * @Groups({"private"})
     */
    private $classDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Booking
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Booking", inversedBy="bookingInfo", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_booking", referencedColumnName="id")
     * })
     * @Groups({"public"})
     */
    private $idBooking;

    /**
     * @var \AppBundle\Entity\CourseClasses
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CourseClasses", inversedBy="bookingInfo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_course_classes", referencedColumnName="id")
     * })
     * @Groups({"private"})
     */
    private $idCourseClasses;



    /**
     * Set classDate
     *
     * @param \DateTime $classDate
     *
     * @return BookingInfo
     */
    public function setClassDate($classDate)
    {
        $this->classDate = $classDate;

        return $this;
    }

    /**
     * Get classDate
     *
     * @return \DateTime
     */
    public function getClassDate()
    {
        return $this->classDate;
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

    /**
     * Set idBooking
     *
     * @param \AppBundle\Entity\Booking $idBooking
     *
     * @return BookingInfo
     */
    public function setIdBooking(\AppBundle\Entity\Booking $idBooking = null)
    {
        $this->idBooking = $idBooking;

        return $this;
    }

    /**
     * Get idBooking
     *
     * @return \AppBundle\Entity\Booking
     */
    public function getIdBooking()
    {
        return $this->idBooking;
    }

    /**
     * Set idCourseClasses
     *
     * @param \AppBundle\Entity\CourseClasses $idCourseClasses
     *
     * @return BookingInfo
     */
    public function setIdCourseClasses(\AppBundle\Entity\CourseClasses $idCourseClasses = null)
    {
        $this->idCourseClasses = $idCourseClasses;

        return $this;
    }

    /**
     * Get idCourseClasses
     *
     * @return \AppBundle\Entity\CourseClasses
     */
    public function getIdCourseClasses()
    {
        return $this->idCourseClasses;
    }
}
