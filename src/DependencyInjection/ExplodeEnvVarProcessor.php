<?php

namespace Phillarmonic\CrescendoVarBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\EnvVarProcessorInterface;

class ExplodeEnvVarProcessor implements EnvVarProcessorInterface
{
    public function getEnv(string $prefix, string $name, \Closure $getEnv): array
    {
        // Retrieve the original value of the environment variable
        $envValue = $getEnv($name);

        // Attempt to split the prefix to find a custom separator, defaulting to comma if not provided
        // The prefix format expected is "explode_customSeparator" or just "explode" for default
        $parts = explode('_', $prefix, 2);
        $separator = $parts[1] ?? ',';

        // Explode the value into an array using the found or default separator
        return explode($separator, $envValue);
    }

    public static function getProvidedTypes(): array
    {
        // Indicate that this processor returns an array, but the prefix is dynamic due to potential custom separators
        return ['explode' => 'array', 'explode_' => 'array'];
    }
}