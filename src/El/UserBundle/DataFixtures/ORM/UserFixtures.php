<?php

// src/Blogger/BlogBundle/DataFixtures/ORM/CommentFixtures.php

namespace El\MicrobloggingBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use El\UserBundle\Entity\User;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{

    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user1);

        $password = $encoder->encodePassword('admin', $user1->getSalt());

        $user1->setUsername('gcavana');
        $user1->setPassword($password);
        $user1->setEmail('gcavana@admin.com');
        $user1->setIsActive(true);
        $manager->persist($user1);

        $manager->flush();
        
        $this->addReference('user-1', $user1);
    }

    public function getOrder()
    {
        return 1;
    }

}