<?php

declare(strict_types=1);

namespace ApiSkeletonsTest\Laravel\Doctrine\DataFixtures\Fixtures;

use ApiSkeletonsTest\Laravel\Doctrine\DataFixtures\Entity\Fixture1 as Fixture1Entity;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class Fixture1 implements
    FixtureInterface
{
    public const GUEST_ID = 1;
    public const USER_ID  = 2;
    public const ADMIN_ID = 3;

    public const GUEST = 'guest';
    public const USER  = 'user';
    public const ADMIN = 'admin';

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
                ->getRepository(Fixture1Entity::class)
                ->find($row['id']);

            if (! $entity) {
                $entity = new Fixture1Entity();

                $entity->setId($row['id']);
                $manager->persist($entity);
            }

            $entity
                ->setName($row['name']);

            $manager->flush();
        }
    }
}
