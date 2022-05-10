<?php

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\EnseignantRepository")
 * @ORM\Table(name="enseignants")
 */
class Enseignant extends Model
{

    protected $fillable = [
        'nom', 'prenom', 'date_naissance', 'genre', 'adresse', 'situation_matrimoniale', 'telephone', 'email'
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
    private $prenom;

    /**
     * @ORM\Column(type="date", name="date_naissance", nullable=true)
     */
    private $date_naissance;


    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $genre;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $situation_matrimoniale;

    /**
     * @ORM\Column(type="integer",nullable=false)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Cours", mappedBy="enseignant", cascade={"persist"})
     */
    private $cours;


    /**
     * @ORM\Column(type="datetime",nullable=false)
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
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of date_naissance
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set the value of date_naissance
     *
     * @return  self
     */
    public function setDateNaissance($date)
    {
        if($date < new \DateTime('now')){
            $this->date_naissance = $date;
        }

        return $this;
    }

    /**
     * Get the value of age
     */
    public function getAge()
    {
        $now = new \DateTime('now');
        $age = ($now->diff($this->getDateNaissance()))->format('%y');
        return $this->age;
    }


    /**
     * Get the value of genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of situation_matrimoniale
     */
    public function getSituationMatrimoniale()
    {
        return $this->situation_matrimoniale;
    }

    /**
     * Set the value of situation_matrimoniale
     *
     * @return  self
     */
    public function setSituationMatrimoniale($situation)
    {
        $this->situation_matrimoniale = $situation;

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
     * Get the value of liens_sociaux
     */
/*     public function getLiensSociaux()
    {
        return $this->liens_sociaux;
    } */

    /**
     * Set the value of liens_sociaux
     *
     * @return  self
     */
/*     public function setLiensSociaux($liens)
    {
        $this->liens_sociaux = $liens;

        return $this;
    } */


}
