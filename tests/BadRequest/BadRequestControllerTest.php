<?php

namespace App\Tests\Ok;

use App\Service\TestFactorySetup;

class BadRequestControllerTest extends TestFactorySetup
{

    const TEST_DATABASE_PATH =__DIR__.'/../db/test-database.sqlite';

    public function setUp()
    {
        parent::setTestDatabasePath(self::TEST_DATABASE_PATH);
        parent::setUp();
    }

    public function testSuitePostExtraField()
    {
        $this->client->request(
            'POST',
            '/api/suite',
            [],
            [],
            ['Content-Type'=>'application/json'],
            json_encode([
                'max'=> 100,
                'int1' => 3,
                'int2' => 5,
                'str1' => 'fizz',
                'str2' => 'buzz',
                'extra'=>'field'
            ])

        );

        $this->assertResponseStatusCodeSame(400);
    }

    public function testSuitePostMissingField()
    {
        $this->client->request(
            'POST',
            '/api/suite',
            [],
            [],
            ['Content-Type'=>'application/json'],
            json_encode([
                'max'=> 100,
                'int1' => 3,
                'int2' => 5,
                'str1' => 'fizz',
            ])

        );

        $this->assertResponseStatusCodeSame(400);
    }
}