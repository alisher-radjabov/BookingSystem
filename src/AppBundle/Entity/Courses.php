<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Courses
 *
 * @ORM\Table(name="courses", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_A9A55A4CBF396750", columns={"id"})}, indexes={@ORM\Index(name="id_instr", columns={"id_instr"})})
 * @ORM\Entity
 */
class Courses
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
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var \AppBundle\Entity\Instructor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Instructor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_instr", referencedColumnName="id")
     * })
     */
    private $idInstr;

    /**
     * @ORM\OneToMany(targetEntity="CourseClasses", mappedBy="idCourse", cascade={"all"}, orphanRemoval=true)
    */
    protected $courseClasses;
    
    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="idCourse", cascade={"all"}, orphanRemoval=true)
    */
    protected $booking; 

    function __construct()
    {
     $this->courseClasses = new ArrayCollection();
     $this->booking = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Courses
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
     * Set idInstr
     *
     * @param \AppBundle\Entity\Instructor $idInstr
     *
     * @return Courses
     */
    public function setIdInstr(\AppBundle\Entity\Instructor $idInstr = null)
    {
        $this->idInstr = $idInstr;

        return $this;
    }

    /**
     * Get idInstr
     *
     * @return \AppBundle\Entity\Instructor
     */
    public function getIdInstr()
    {
        return $this->idInstr;
    }

    /**
     * Add courseClass
     *
     * @param \AppBundle\Entity\CourseClasses $courseClass
     *
     * @return Courses
     */
    public function addCourseClass(\AppBundle\Entity\CourseClasses $courseClass)
    {
        $this->courseClasses[] = $courseClass;

        return $this;
    }

    /**
     * Remove courseClass
     *
     * @param \AppBundle\Entity\CourseClasses $courseClass
     */
    public function removeCourseClass(\AppBundle\Entity\CourseClasses $courseClass)
    {
        $this->courseClasses->removeElement($courseClass);
    }

    /**
     * Get courseClasses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourseClasses()
    {
        return $this->courseClasses;
    }

    

    /**
     * Add booking
     *
     * @param \AppBundle\Entity\Booking $booking
     *
     * @return Courses
     */
    public function addBooking(\AppBundle\Entity\Booking $booking)
    {
        $this->booking[] = $booking;

        return $this;
    }

    /**
     * Remove booking
     *
     * @param \AppBundle\Entity\Booking $booking
     */
    public function removeBooking(\AppBundle\Entity\Booking $booking)
    {
        $this->booking->removeElement($booking);
    }

    /**
     * Get booking
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBooking()
    {
        return $this->booking;
    }
}
