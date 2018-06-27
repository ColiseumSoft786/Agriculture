<?php

namespace App\HomeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/News');
    }

    public function testSingle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/News/{id}');
    }

}
