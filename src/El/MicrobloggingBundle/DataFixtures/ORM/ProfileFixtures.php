<?php

namespace El\MicrobloggingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use El\MicrobloggingBundle\Entity\Profile;

class ProfileFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $profile1 = new Profile();
        $profile1->setFullname('Guillaume Cavana');
        $profile1->setLanguage('en');
        $profile1->setTimezone('');
        $profile1->setHomepage('http://guillaume.cavana.com');
        $profile1->setBio('trop cool j\'adore le web');
        $profile1->setLocation('Poissy');
        $manager->persist($profile1);

        $manager->flush();

        $this->addReference('profile-1', $profile1);
    }

    public function getOrder()
    {
        return 2;
    }

}