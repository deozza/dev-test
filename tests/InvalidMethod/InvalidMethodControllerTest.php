<?php

namespace App\Tests\Ok;

use App\Service\TestFactorySetup;

class InvalidMethodControllerTest extends TestFactorySetup
{

    const TEST_DATABASE_PATH =__DIR__.'/../db/test-database.sqlite';

    public function setUp()
    {
        parent::setTestDatabasePath(self::TEST_DATABASE_PATH);
        parent::setUp();
    }

    public function testSuiteInvalidGet()
    {
        $this->client->request(
            'GET',
            '/api/suite',
            [],
            [],
            ['Content-Type'=>'application/json']
        );

        $this->assertResponseStatusCodeSame(405);
    }

    public function testSuiteInvalidPatch()
    {
        $this->client->request(
            'PATCH',
            '/api/suite',
            [],
            [],
            ['Content-Type'=>'application/json']
        );

        $this->assertResponseStatusCodeSame(405);
    }

    public function testSuiteInvalidPut()
    {
        $this->client->request(
            'PUT',
            '/api/suite',
            [],
            [],
            ['Content-Type'=>'application/json']
        );

        $this->assertResponseStatusCodeSame(405);
    }

    public function testSuiteInvalidDelete()
    {
        $this->client->request(
            'DELETE',
            '/api/suite',
            [],
            [],
            ['Content-Type'=>'application/json']
        );

        $this->assertResponseStatusCodeSame(405);
    }

    public function testSuiteMostAskedInvalidPost()
    {
        $this->client->request(
            'POST',
            '/api/suites/most-asked',
            [],
            [],
            ['Content-Type'=>'application/json']
        );

        $this->assertResponseStatusCodeSame(405);
    }

    public function testSuiteMostAskedInvalidPatch()
    {
        $this->client->request(
            'PATCH',
            '/api/suite/most-asked',
            [],
            [],
            ['Content-Type'=>'application/json']
        );

        $this->assertResponseStatusCodeSame(405);
    }

    public function testSuiteMostAskedInvalidPut()
    {
        $this->client->request(
            'PUT',
            '/api/suite/most-asked',
            [],
            [],
            ['Content-Type'=>'application/json']
        );

        $this->assertResponseStatusCodeSame(405);
    }

    public function testSuiteMostAskedInvalidDelete()
    {
        $this->client->request(
            'DELETE',
            '/api/suite/most-asked',
            [],
            [],
            ['Content-Type'=>'application/json']
        );

        $this->assertResponseStatusCodeSame(405);
    }
}