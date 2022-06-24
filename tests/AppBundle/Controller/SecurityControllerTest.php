<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class SecurityControllerTest extends WebTestCase
{
    public function test_it_should_display_login_page(): void
    {
        $client = self::createClient();

        $urlGenerator = $client->getContainer()->get('router');

        $crawler = $client->request('GET', $urlGenerator->generate('login'));

        $response = $client->getResponse();

        self::assertTrue($response->isOk());
        self::assertGreaterThan(
            0,
            $crawler->filter('form')->count()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('input[name=_username]')->count()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('input[name=_password]')->count()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('button[type=submit]')->count()
        );
    }
}