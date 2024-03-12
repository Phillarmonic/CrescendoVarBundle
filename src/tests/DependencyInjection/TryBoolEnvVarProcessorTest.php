<?php

namespace Tests\DependencyInjection;
use Phillarmonic\CrescendoVarBundle\DependencyInjection\TryBoolEnvVarProcessor;
use PHPUnit\Framework\TestCase;

class TryBoolEnvVarProcessorTest extends TestCase
{
    public function testGetEnv()
    {
        $processor = new TryBoolEnvVarProcessor();

        // Test with a string that can be converted to a boolean
        $result = $processor->getEnv('trybool', 'TEST_VAR', function() { return 'true'; });
        $this->assertSame(true, $result);

        // Test with a string that cannot be converted to a boolean
        $result = $processor->getEnv('trybool', 'TEST_VAR', function() { return 'abc'; });
        $this->assertSame('abc', $result);
    }
}