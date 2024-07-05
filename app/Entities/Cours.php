<?php

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\CoursRepository")
 * @ORM\Table(name="cours")
 */
class Cours
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
    private $nom;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $coeficient;


    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Evaluation", mappedBy="coursid", cascade={"persist"})
     */
    private $evaluations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Enseignant", inversedBy="cours", cascade={"persist"})
     * @ORM\JoinColumn(name="enseignant_id", referencedColumnName="id")
     */
    private $enseignantid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Classes", inversedBy="cours", cascade={"persist"})
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id")
     */
    private $classeid;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }


    /**
     * Get the value of coeficient
     */
    public function getCoeficient()
    {
        return $this->coeficient;
    }

    /**
     * Set the value of coeficient
     *
     * @return  self
     */
    public function setCoeficient($coeficient)
    {
        $this->coeficient = $coeficient;

        return $this;
    }

    /**
     * Get the value of classeid
     */
    public function getClasseId()
    {
        return $this->classeid;
    }

    /**
     * Set the value of classeid
     *
     * @return  self
     */
    public function setClasseId($classeid)
    {
        $this->classeid = $classeid;

        return $this;
    }

     /**
     * Get the value of enseignantid
     */
    public function getEnseignantId()
    {
        return $this->enseignantid;
    }

    /**
     * Set the value of enseignantid
     *
     * @return  self
     */
    public function setEnseignantId($enseignantid)
    {
        $this->enseignantid = $enseignantid;

        return $this;
    }

    /**
     * Get the value of evaluations
     */
    public function getEvaluations()
    {
        return $this->evaluations;
    }

    /**
     * Set the value of evaluations
     *
     * @return  self
     */
    public function setEvaluations($evaluations)
    {
        $this->evaluations = $evaluations;

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
