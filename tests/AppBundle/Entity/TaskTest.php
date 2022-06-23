<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Task;
use DateTime;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function test_it_should_initialize_created_date_property()
    {
        $task = new Task();

        self::assertNotNull($task->getCreatedAt());
        self::assertSame((new DateTime())->format('Y-m-d'), $task->getCreatedAt()->format('Y-m-d'));
    }
}
