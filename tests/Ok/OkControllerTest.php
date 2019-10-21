<?php

namespace App\Tests\Ok;

use App\Service\TestFactorySetup;

class OkControllerTest extends TestFactorySetup
{

    const TEST_DATABASE_PATH =__DIR__.'/../db/test-database.sqlite';

    public function setUp()
    {
        parent::setTestDatabasePath(self::TEST_DATABASE_PATH);
        parent::setUp();
    }

    public function testSuitePost()
    {
        $this->client->request(
            'POST',
            '/api/suite',
            [],
            [],
            ['Content-Type'=>'application/json'],
            json_encode([
                'max'=> 6,
                'int1' => 2,
                'int2' => 3,
                'str1' => 'fizz',
                'str2' => 'buzz'
            ])
        );

        $this->assertResponseStatusCodeSame(201);
        $this->assertEquals('"1 fizz buzz fizz 5 fizzbuzz "', $this->client->getResponse()->getContent());
    }

    public function testStatGet()
    {
        $this->client->request(
            'GET',
            '/api/suites/most-asked',
            [],
            [],
            ['Content-Type'=>'application/json'],
            []
        );

        $this->assertResponseStatusCodeSame(200);
    }
}