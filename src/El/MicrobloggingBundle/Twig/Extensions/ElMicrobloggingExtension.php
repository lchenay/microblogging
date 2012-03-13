<?php

namespace El\MicrobloggingBundle\Twig\Extensions;

use El\MicrobloggingBundle\Entity\Message;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of BloggerBlogExtension
 *
 * @author gcavana
 */
class ElMicroBloggingExtension extends \Twig_Extension
{
    
    protected $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array('el_microblogging_message_link_show' => new \Twig_Function_Method($this, 'messageLinkShow'));
    }
    
    public function getFilters()
    {
        return array('el_microblogging_created_ago' => new \Twig_Filter_Method($this, 'createdAgo'));
    }
    
    public function messageLinkShow(Message $message)
    {
        return $this->container->get('router')->generate('message_show', array('id' => $message->getId()));
    }

    public function createdAgo(\DateTime $dateTime)
    {
        $delta = time() - $dateTime->getTimestamp();
        if ($delta < 0)
            throw new \Exception("createdAgo is unable to handle dates in the future");

        $duration = "";
        if ($delta < 60) {
            // Seconds
            $time = $delta;
            $duration = $time . " second" . (($time > 1) ? "s" : "") . " ago";
        } else if ($delta <= 3600) {
            // Mins
            $time = floor($delta / 60);
            $duration = $time . " minute" . (($time > 1) ? "s" : "") . " ago";
        } else if ($delta <= 86400) {
            // Hours
            $time = floor($delta / 3600);
            $duration = $time . " hour" . (($time > 1) ? "s" : "") . " ago";
        } else {
            // Days
            $time = floor($delta / 86400);
            $duration = $time . " day" . (($time > 1) ? "s" : "") . " ago";
        }

        return $duration;
    }

    public function getName()
    {
        return 'el_microblogging_extension';
    }

}