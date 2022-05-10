<?php

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\ClassesRepository")
 *
 * @ORM\Table(name="classes")
 */
class Classes
 //extends User
{

    public $timestamps = false;

    protected $fillable = ['nom'];

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
     * @ORM\OneToMany(targetEntity="App\Entities\Apprenant", mappedBy="classes", cascade={"persist"})
     */
    private $apprenants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Cours", mappedBy="classes", cascade={"persist"})
     */
    private $cours;

     /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $createdAt;

     /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $updatedAt;
}
