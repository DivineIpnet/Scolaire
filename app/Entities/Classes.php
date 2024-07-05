<?php

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;


/**
 * @ORM\Entity(repositoryClass="App\Repositories\ClassesRepository")
 * @ORM\Table(name="classes")
 */
class Classes
{

   // public $timestamps = false;

    public function __construct()
    {
        $this->createdAt = new Carbon();

    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",options={"unsigned"=true})
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Niveau", inversedBy="classes", cascade={"persist"})
     * @ORM\JoinColumn(name="niveau_id", referencedColumnName="id")
     */
    private $niveauid;


     /**
     * @ORM\Column(type="string",nullable=false)
     */
    protected $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Apprenant", mappedBy="classeid", cascade={"persist"})
     */
    private $apprenants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Cours", mappedBy="classeid", cascade={"persist"})
     */
    private $cours;

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
     * Get the value of niveauid
     */
    public function getNiveauId()
    {
        return $this->niveauid;
    }

    /**
     * Set the value of niveauid
     *
     * @return  self
     */
    public function setNiveauId($niveauid)
    {
        $this->niveauid = $niveauid;

        return $this;
    }


    /**
     * Get the value of apprenants
     */
    public function getApprenants()
    {
        return $this->apprenants;
    }

    /**
     * Set the value of apprenants
     *
     * @return  self
     */
    public function setApprenants($apprenants)
    {
        $this->apprenants = $apprenants;

        return $this;
    }

    /**
     * Get the value of cours
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Set the value of cours
     *
     * @return  self
     */
    public function setCours($cours)
    {
        $this->cours = $cours;

        return $this;
    }
                
}
