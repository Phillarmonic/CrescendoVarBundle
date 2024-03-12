<?php
namespace Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Phillarmonic\CrescendoVarBundle\DependencyInjection\TryIntEnvVarProcessor;

class TryIntEnvVarProcessorTest extends TestCase
{
    final public function testGetEnv() : void
    {
        $processor = new TryIntEnvVarProcessor();

        // Test with a string that can be converted to an integer
        $result = $processor->getEnv('tryint', 'TEST_VAR', function() { return '123'; });
        $this->assertSame(123, $result);

        // Test with a string that cannot be converted to an integer
        $result = $processor->getEnv('tryint', 'TEST_VAR', function() { return 'abc'; });
        $this->assertSame('abc', $result);

        // Test with a string that is "0"
        $result = $processor->getEnv('tryint', 'TEST_VAR', function() { return '0'; });
        $this->assertSame(0, $result);
    }
}