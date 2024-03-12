<?php

namespace Phillarmonic\CrescendoVarBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\EnvVarProcessorInterface;

class TryBoolEnvVarProcessor implements EnvVarProcessorInterface
{
    public function getEnv(string $prefix, string $name, \Closure $getEnv): mixed
    {
        // Retrieve the original value of the environment variable
        $value = $getEnv($name);

        // Use filter_var to convert the value to a boolean
        $boolValue = filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        // Return the boolean value if conversion was successful, otherwise return the original value
        return ($boolValue !== null) ? $boolValue : $value;
    }

    public static function getProvidedTypes(): array
    {
        // The key is the prefix used in the .env file, and the value indicates the return type
        return ['trybool' => 'bool'];
    }
}