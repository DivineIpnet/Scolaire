<?php

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Model;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\ApprenantRepository")
 * @ORM\Table(name="apprenants")
 */
class Apprenant extends Model
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
    private $prenom;

    /**
     * @ORM\Column(type="date", name="date_naissance", nullable=false)
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
     * @ORM\Column(type="boolean",nullable=false)
     */
    //private $;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    private $createdAt;


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



}
