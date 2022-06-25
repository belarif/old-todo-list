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
}