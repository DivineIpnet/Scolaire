<?php

namespace App\Entities;


use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\EvaluationRepository")
 * //@ORM\InheritanceType("JOINED")
 * @ORM\Table(name="evaluations")
 */
class Evaluation

{
    public function __construct()
    {
        $this->createdAt = new Carbon();

    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="integer",nullable=false)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Cours", inversedBy="evaluations")
     * @ORM\JoinColumn(name="cours_id", referencedColumnName="id")
     */
    private $coursid;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $createdAt;



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }    

        /**
     * Get the value of coursid
     */
    public function getCoursid()
    {
        return $this->coursid;
    }

    /**
     * Set the value of coursid
     *
     * @return  self
     */
    public function setCoursid($coursid)
    {
        $this->coursid = $coursid;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

}
