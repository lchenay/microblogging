<?php

namespace El\MicrobloggingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use El\MicrobloggingBundle\Entity\Message;

class MessageFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
//        $blog1 = new Blog();
//        $blog1->setTitle('A day with Symfony2');
//        $blog1->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
//        $blog1->setImage('beach.jpg');
//        $blog1->setAuthor('dsyph3r');
//        $blog1->setTags('symfony2, php, paradise, symblog');
//        $blog1->setCreated(new \DateTime());
//        $blog1->setUpdated($blog1->getCreated());
//        $manager->persist($blog1);
//
//        $manager->persist($blog5);
//
//        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

}