<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class TaskControllerTest extends WebTestCase
{
    public function test_it_should_display_task_create_page()
    {
        $client = self::createClient();

        $urlGenerator = $client->getContainer()->get('router');

        $crawler = $client->request('GET', $urlGenerator->generate('task_create'));

        $response = $client->getResponse();

        self::assertTrue($response->isOk());

        self::assertNotNull($crawler->selectLink('Retour à la liste des tâches'));
        self::assertGreaterThan(
            0,
            $crawler->filter('form')->count()
        );
        self::assertNotNull($crawler->selectButton('submit'));
    }

    public function test_it_should_display_tasks_list_page()
    {
        $client = self::createClient();

        $urlGenerator = $client->getContainer()->get('router');

        $crawler = $client->request('GET', $urlGenerator->generate('task_list'));

        $response = $client->getResponse();

        self::assertTrue($response->isOk());
        self::assertNotNull($crawler->selectLink('Créer une tâche'));
    }

    public function test_it_should_display_edit_task_page()
    {
        $client = self::createClient();

        $crawler = $client->request('GET', '/tasks/2/edit');

        $response = $client->getResponse();

        self::assertTrue($response->isOk());
        self::assertGreaterThan(
            0,
            $crawler->filter('form')->count()
        );
        self::assertNotNull($crawler->selectButton('submit'));
        self::assertGreaterThan(
            0,
            $crawler->filter('input[id=task_title]')->count()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('textarea[id=task_content]')->count()
        );
    }
}