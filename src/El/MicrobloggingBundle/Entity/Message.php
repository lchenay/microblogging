<?php

namespace El\MicrobloggingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use El\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use El\MicrobloggingBundle\Encryptor\EncryptableInterface;

/**
 * @ORM\Entity(repositoryClass="El\MicrobloggingBundle\Entity\MessageRepository")
 * @ORM\Table(name="el_mb_messages")
 * @ORM\HasLifecycleCallbacks()
 * @author Guillaume Cavana
 */
class Message implements EncryptableInterface
{

    const STATUS_MESSAGE = 0;
    const STATUS_REPLY = 1;
    const SOURCE_WEB = 'web';

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
        $this->setStatus(self::STATUS_MESSAGE);
        $this->setSource(self::SOURCE_WEB);
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $uri;

    /**
     * 
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="El\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @Assert\NotBlank
     * @Assert\MinLength(
     *      limit=10,
     *      message="Your message must have at least {{ limit }} characters."
     * )      
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
     * Set user
     *
     * @param El\UserBundle\Entity\User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return El\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}