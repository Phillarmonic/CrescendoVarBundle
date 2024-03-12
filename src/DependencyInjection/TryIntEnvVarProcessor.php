<?php
namespace Phillarmonic\CrescendoVarBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\EnvVarProcessorInterface;

class TryIntEnvVarProcessor implements EnvVarProcessorInterface
{
    public function getEnv(string $prefix, string $name, \Closure $getEnv): mixed
    {
        // Retrieve the original value of the environment variable
        $value = $getEnv($name);

        // Attempt to convert the value to an integer
        $intValue = intval($value);

        // Return the integer value, or the original value if conversion fails (or results in zero but zero is not the original value)
        return ($intValue != 0 || $value === "0") ? $intValue : $value;
    }

    public static function getProvidedTypes(): array
    {
        // The key is the prefix used in the .env file, and the value is the returned type, which could be an int or the original type
        return ['tryint' => 'string'];
    }
}