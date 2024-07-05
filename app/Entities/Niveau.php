<?php

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\NiveauRepository")
 * @ORM\Table(name="niveaux")
 */
class Niveau
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
     * @ORM\ManyToOne(targetEntity="App\Entities\Ecole", inversedBy="niveaux", cascade={"persist"})
     * @ORM\JoinColumn(name="ecole_id", referencedColumnName="id")
     */
    private $ecoleid;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $nom;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $periode;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Classes", mappedBy="niveau", cascade={"persist"})
     */
    private $classes;

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
     * Get the value of periode
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * Set the value of periode
     *
     * @return  self
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;

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

    /**
     * Get the value of classes
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Set the value of classes
     *
     * @return  self
     */
    public function setClasses($classes)
    {
        $this->classes = $classes;

        return $this;
    }


   /**
     * Get the value of ecoleid
     */
    public function getEcoleId()
    {
        return $this->ecoleid;
    }

    /**
     * Set the value of ecoleid
     *
     * @return  self
     */
    public function setEcoleId($ecoleid)
    {
        $this->ecoleid = $ecoleid;

        return $this;
    }    
}
