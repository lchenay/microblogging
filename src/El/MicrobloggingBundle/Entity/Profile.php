<?php

namespace El\MicrobloggingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use El\UserBundle\Entity\User;

/**
 * El\MicrobloggingBundle\Entity\Profile
 * @ORM\Entity(repositoryClass="El\MicrobloggingBundle\Entity\ProfileRepository")
 * @ORM\Table(name="el_mb_profiles")
 * @ORM\HasLifecycleCallbacks()
 * @author Guillaume Cavana
 */
class Profile
{

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    public function __toString()
    {
        return $this->getNickname();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="El\UserBundle\Entity\User", inversedBy="profile")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(name="fullname", type="string", length=255)
     */
    private $fullname;

    /**
     * Message identifier
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uri;

    /**
     * @ORM\Column(name="language", type="string", length=50)
     */
    private $language;

    /**
     * @ORM\Column(name="timezone", type="string", length=50)
     */
    private $timezone;

    /**
     * Message content
     * @ORM\Column(name="homepage", type="string", length=255)
     */
    private $homepage;

    /**
     * Biographie
     * @ORM\Column(name="bio", type="text")
     */
    private $bio;

    /**
     * @ORM\Column(name="location", type="string", length=32)
     */
    private $location;

    /**
     * latitude
     * @ORM\Column(type="float", precision=10, scale=7, nullable=true)
     */
    private $lat;

    /**
     * longitude
     * @ORM\Column(type="float", precision=10, scale=7, nullable=true)
     */
    private $lon;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * Get fullname
     *
     * @return string 
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set uri
     *
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * Get uri
     *
     * @return string 
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set language
     *
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set homepage
     *
     * @param string $homepage
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    /**
     * Get homepage
     *
     * @return string 
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set bio
     *
     * @param text $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * Get bio
     *
     * @return text 
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set location
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set lat
     *
     * @param numeric $lat
     */
    public function setLat(\numeric $lat)
    {
        $this->lat = $lat;
    }

    /**
     * Get lat
     *
     * @return numeric 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param numeric $lon
     */
    public function setLon(\numeric $lon)
    {
        $this->lon = $lon;
    }

    /**
     * Get lon
     *
     * @return numeric 
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return datetime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set user
     *
     * @param El\MicrobloggingBundle\User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return El\MicrobloggingBundle\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}