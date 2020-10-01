<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Prinx\Arr;

/**
 * @todo The tests need works
 */
class EnvTest extends TestCase
{
    public function testExample()
    {
        $configArray = [
            'default' => [
                'driver'   => 'mysql',
                'host'     => 'localhost',
                'user'     => 'root',
                'password' => '',
                'dbname'   => 'test',
            ],

            'production' => [
                'driver'   => 'mysql',
                'host'     => 'localhost',
                'user'     => 'root',
                'password' => '',
                'dbname'   => 'production',
            ],
        ];

        $this->assertEquals(Arr::multiKeyGet('default.user', $configArray), 'root');
        $this->assertEquals(Arr::multiKeyGet('default.dbname', $configArray), 'test');

        $configArray = Arr::multiKeySet('default.dbname', 'development');
        $this->assertEquals(Arr::multiKeySet('default.dbname', $configArray), 'development');

        $configArray = Arr::multiKeyRemove('default.host');
        $this->assertEquals(Arr::multiKeySet('default.host', $configArray), null);
    }
}
