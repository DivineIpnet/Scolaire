<?php

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\UserRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\Table(name="users")
 */
class User extends Authenticatable
{
    use \LaravelDoctrine\ORM\Auth\Authenticatable;
    use \LaravelDoctrine\ORM\Notifications\Notifiable;
    use Notifiable;


    protected $fillable = ['email', 'telephone', 'password'];


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",options={"unsigned"=true})
     */
    protected $id;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $telephone;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $password;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */

    protected $completedAt;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $verifiedAt;

    /**
     * @ORM\Column(type="string",nullable=true)
     */

    protected $verifiedToken;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $updatedAt;

}
