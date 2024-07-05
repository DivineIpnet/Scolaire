<?php

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\EcoleRepository")
 * @ORM\Table(name="ecoles")
 */
class Ecole
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
     * @ORM\Column(type="string",nullable=false)
     */
    private $nom;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $email;


    /**
     * @ORM\Column(type="integer",nullable=false)
     */
    private $telephone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Ville", inversedBy="ecole")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */
    private $ville;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Niveau", mappedBy="ecole", cascade={"persist"})
     */
    private $niveaux;


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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }


    /**
     * Get the value of ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

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
