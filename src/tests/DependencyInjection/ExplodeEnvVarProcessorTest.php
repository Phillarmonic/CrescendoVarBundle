<?php

namespace Tests\DependencyInjection;

use Phillarmonic\CrescendoVarBundle\DependencyInjection\ExplodeEnvVarProcessor;
use PHPUnit\Framework\TestCase;

class ExplodeEnvVarProcessorTest extends TestCase
{
    public function testGetEnv()
    {
        $processor = new ExplodeEnvVarProcessor();

        // Test with a string that can be exploded
        $result = $processor->getEnv('explode', 'TEST_VAR', function() { return '1,2,3'; });
        $this->assertSame(['1', '2', '3'], $result);

        // Test with a string that cannot be exploded
        $result = $processor->getEnv('explode', 'TEST_VAR', function() { return 'abc'; });
        $this->assertSame(['abc'], $result);
    }
}