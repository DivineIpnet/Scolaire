<?php

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\CoursRepository")
 * @ORM\Table(name="cours")
 */
class Cours extends Model
{

    protected $fillable = [
        'nom', 'description'
    ];


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
     * @ORM\Column(type="datetime",nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Evaluation", mappedBy="cours", cascade={"persist"})
     */
    private $evaluations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Enseignant", inversedBy="cours", cascade={"persist"})
     * @ORM\JoinColumn(name="enseignant_id", referencedColumnName="id")
     */
    private $enseignant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Classes", inversedBy="cours", cascade={"persist"})
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id")
     */
    private $classes;
}
