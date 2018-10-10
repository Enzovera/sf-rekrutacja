<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	/**
	 * @ORM\Column(type="string", length=255, unique=true)
	 * @Assert\NotBlank()
	 * @Assert\Email()
	 */
	private $email;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
	private $firstName;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $lastName;
    /**
     * @ORM\Column(type="date", length=255)
     * @Assert\NotBlank()
     */
    private $birthDate;
	/**
	 * @ORM\Column(type="string", length=255, unique=true)
	 * @Assert\NotBlank()
     * @Assert\Type(
     *     type="lower",
     *     message="Login must contain only small letters"
     * )
	 */
	private $username;
	/**
	 * @Assert\NotBlank()
	 * @Assert\Length(max=4096)
	 */
	private $plainPassword;
	/**
     * @ORM\Column(type="string", length=64)
	 */
	private $password;
	/**
	 * @ORM\Column(type="array")
	 */
	private $roles;
	/**
    * @ORM\Column(type="string", length=255)
    * @Assert\NotBlank()
    */
	private $position;
	
	public function __construct()
	{
	$this->roles = array('ROLE_USER');
	}

    /**
     * @return mixed
     */
    public function getId()
	{
		return $this->id;
	}

    /**
     * @return mixed
     */
    public function getEmail()
	{
		return $this->email;
	}

    /**
     * @param $email
     */
    public function setEmail($email)
	{
		$this->email = $email;
	}

    /**
     * @return string
     */
    public function getUsername()
	{
		return $this->username;
	}

    /**
     * @param $username
     */
    public function setUsername($username)
	{
		$this->username = $username;
	}

    /**
     * @return mixed
     */
    public function getPlainPassword()
	{
		return $this->plainPassword;
	}

    /**
     * @param $password
     */
    public function setPlainPassword($password)
	{
		$this->plainPassword = $password;
	}

    /**
     * @return string
     */
    public function getPassword()
	{
		return $this->password;
	}

    /**
     * @param $password
     */
    public function setPassword($password)
	{
		$this->password = $password;
	}
    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $name
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return null|string
     */
    public function getSalt()
	{
		return null;
	}
	/**
	 * Removes sensitive data from the user.
	 *
	 * This is important if, at any given point, sensitive information like
	 * the plain-text password is stored on this object.
	 */
	public function eraseCredentials()
	{
	}

    /**
     * @return array
     */
    public function getRoles()
	{
		return $this->roles;
	}




}