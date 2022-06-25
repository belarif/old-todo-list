<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class UserControllerTest extends WebTestCase
{
    public function test_it_should_display_user_create_page()
    {
        $client = self::createClient();

        $urlGenerator = $client->getContainer()->get('router');

        $crawler = $client->request('GET', $urlGenerator->generate('user_create'));

        $response = $client->getResponse();
        self::assertTrue($response->isOk());
        self::assertGreaterThan(
            0,
            $crawler->filter('form')->count());
        self::assertGreaterThan(
            0,
            $crawler->filter('input[id=user_username]')->count()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('input[id=user_password_first]')->count()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('input[id=user_password_second]')->count()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('input[id=user_email]')->count()
        );
        self::assertNotNull($crawler->selectButton('submit'));
    }

    public function test_it_should_display_users_list_page()
    {
        $client = self::createClient();

        $urlGenerator = $client->getContainer()->get('router');

        $crawler = $client->request('GET', $urlGenerator->generate('user_list'));

        $response = $client->getResponse();
        self::assertTrue($response->isOk());
        self::assertSame(
            'Liste des utilisateurs',
            $crawler->filter('h1')->first()->text()
        );
    }
}