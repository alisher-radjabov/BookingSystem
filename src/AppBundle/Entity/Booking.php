<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Booking
 *
 * @ORM\Table(name="booking", indexes={@ORM\Index(name="id_course", columns={"id_course"})})
 * @ORM\Entity
 */
class Booking
{
    /**
     * @ORM\OneToMany(targetEntity="BookingInfo", mappedBy="idBooking", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups({"private"})
    */
    protected $bookingInfo; 

    function __construct()
    {
     $this->bookingInfo = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="stud_count", type="integer", nullable=false)
     */
    private $studCount;

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
     * @var \AppBundle\Entity\Courses
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Courses", inversedBy="booking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_course", referencedColumnName="id")
     * })
     */
    private $idCourse;



    /**
     * Set email
     *
     * @param string $email
     *
     * @return Booking
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set studCount
     *
     * @param integer $studCount
     *
     * @return Booking
     */
    public function setStudCount($studCount)
    {
        $this->studCount = $studCount;

        return $this;
    }

    /**
     * Get studCount
     *
     * @return integer
     */
    public function getStudCount()
    {
        return $this->studCount;
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
     * Set idCourse
     *
     * @param \AppBundle\Entity\Courses $idCourse
     *
     * @return Booking
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
     * Add bookingInfo
     *
     * @param \AppBundle\Entity\BookingInfo $bookingInfo
     *
     * @return Booking
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
