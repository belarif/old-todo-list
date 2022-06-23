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

    public function test_it_should_initialize_is_done_property()
    {
        $task = new Task();

        self::assertSame(false, $task->isDone());
    }

    public function test_it_should_update_title_property()
    {
        $task = new Task();
        self::assertEmpty($task->getTitle());

        $task->setTitle('le titre');
        self::assertSame('le titre', $task->getTitle());
    }

    public function test_it_should_update_content_property()
    {
        $task = new Task();
        self::assertEmpty($task->getContent());

        $task->setContent('le contenu de la tache');
        self::assertSame('le contenu de la tache', $task->getContent());
    }
}
