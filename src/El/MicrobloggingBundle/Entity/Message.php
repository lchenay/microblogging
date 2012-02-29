<?php

namespace El\MicrobloggingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="El\MicrobloggingBundle\Entity\MessageRepository")
 * @ORM\Table(name="el_mb_messages")
 * @ORM\HasLifecycleCallbacks()
 * @author Guillaume Cavana
 */
class Message
{

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    public function __toString()
    {
        return $this->getContent();
    }

    /**
     * @ORM\preUpdate 
     */
    public function setUpdatedValue()
    {
        $this->setUpdated(new \DateTime());
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * 
     * @ORM\Column(type="string", length=255)
     */
    protected $uri;

    /**
     * 
     * @ORM\Column(type="boolean")
     */
    protected $status;

    /**
     * @ORM\OneToOne(targetEntity="El\MicrobloggingBundle\Entity\Profile")
     * @ORM\JoinColumn(name="from_profile_id", referencedColumnName="id")
     */    
    protected $fromProfile;

    /**
     * @ORM\OneToOne(targetEntity="El\MicrobloggingBundle\Entity\Profile")
     * @ORM\JoinColumn(name="to_profile_id", referencedColumnName="id")
     */
    protected $toProfile;

    /**
     * Message content
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * Html rendering of content
     * @ORM\Column(type="text")
     */
    protected $rendered;

    /**
     * Source of comment, like "web", "im", or "clientname"
     * @ORM\Column(type="string", length="32")
     */
    protected $source;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

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
     * Set status
     *
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set rendered
     *
     * @param text $rendered
     */
    public function setRendered($rendered)
    {
        $this->rendered = $rendered;
    }

    /**
     * Get rendered
     *
     * @return text 
     */
    public function getRendered()
    {
        return $this->rendered;
    }

    /**
     * Set source
     *
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
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
     * Set fromProfile
     *
     * @param El\MicrobloggingBundle\Entity\Profile $fromProfile
     */
    public function setFromProfile(\El\MicrobloggingBundle\Entity\Profile $fromProfile)
    {
        $this->fromProfile = $fromProfile;
    }

    /**
     * Get fromProfile
     *
     * @return El\MicrobloggingBundle\Entity\Profile 
     */
    public function getFromProfile()
    {
        return $this->fromProfile;
    }

    /**
     * Set toProfile
     *
     * @param El\MicrobloggingBundle\Entity\Profile $toProfile
     */
    public function setToProfile(\El\MicrobloggingBundle\Entity\Profile $toProfile)
    {
        $this->toProfile = $toProfile;
    }

    /**
     * Get toProfile
     *
     * @return El\MicrobloggingBundle\Entity\Profile 
     */
    public function getToProfile()
    {
        return $this->toProfile;
    }
}