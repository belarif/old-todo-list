<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_it_should_update_username_property()
    {
        $user = new User();

        self::assertEmpty($user->getUsername());
        $user->setUsername('ocine');
        self::assertSame('ocine', $user->getUsername());
    }
}