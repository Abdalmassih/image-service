<?php
require_once __DIR__ . '/../../app/libraries/Database.php';

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use function PHPUnit\Framework\assertNotEmpty;
use function PHPUnit\Framework\assertStringContainsString;
use function PHPUnit\Framework\assertStringContainsStringIgnoringCase;

/**
 * ImageTest
 * @group group
 */
class ImageTest extends TestCase
{
    /** @test */
    public function testImages()
    {
        // create http client (Guzzle)
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost',
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);

        $response = $client->request('GET', '/');
        $statusCode = $response->getStatusCode();
        $reason = $response->getReasonPhrase();

        $this->assertSame(200, $statusCode);
        $this->assertSame('OK', $reason);

        $body = (string) $response->getBody();
        assertNotEmpty($body);

        assertStringContainsString('court.jpg', $body); //TODO: add files in test and check response accordingly

        // $this->getTestDbConnection(); //TODO: populate db and check data
    }

    //TODO
    public function getTestDbConnection()
    {
        define('DB_HOST', 'db-test');
        define('DB_USER', 'abd');
        define('DB_PASS', 'pwd');
        define('DB_NAME', 'image-service');
        define('DB_PORT', '3307');
        $db = new Database('3307');
    }
}