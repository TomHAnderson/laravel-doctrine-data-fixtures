<?php

declare(strict_types=1);

namespace ApiSkeletonsTest\Laravel\Doctrine\DataFixtures\Fixtures;

use ApiSkeletonsTest\Laravel\Doctrine\DataFixtures\Entity\Fixture2 as Fixture2Entity;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class Fixture2 implements
    FixtureInterface
{
    public const GUEST_ID = 4;
    public const USER_ID  = 5;
    public const ADMIN_ID = 6;

    public const GUEST = 'guest2';
    public const USER  = 'user2';
    public const ADMIN = 'admin2';

    public function load(ObjectManager $manager): void
    {
        $data = [
            [
                'id' => self::GUEST_ID,
                'name' => self::GUEST,
            ],
            [
                'id' => self::USER_ID,
                'name' => self::USER,
            ],
            [
                'id' => self::ADMIN_ID,
                'name' => self::ADMIN,
            ],
        ];

        foreach ($data as $row) {
            $entity = $manager
                ->getRepository(Fixture2Entity::class)
                ->find($row['id']);

            if (! $entity) {
                $entity = new Fixture2Entity();

                $entity->setId($row['id']);
                $manager->persist($entity);
            }

            $entity
                ->setName($row['name']);

            $manager->flush();
        }
    }
}
