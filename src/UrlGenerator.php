<?php

namespace U;


class UrlGenerator
{
    public const API_MODE = 'base_url';
    public const TEST_MODE = 'test_url';

    private array $config;

    public function __construct(?string $baseUrl = null, ?string $testUrl = null)
    {
        $config[self::API_MODE] = $this->formatUrl($baseUrl ?? 'https://jsonplaceholder.typicode.com');
        $config[self::TEST_MODE] = $this->formatUrl($testUrl ?? 'https://test.jsonplaceholder.typicode.com');
        $this->config = $config;
    }

    public function make(string $resource = '', string $mode = self::API_MODE): string
    {
        if (in_array($mode, [self::API_MODE, self::TEST_MODE]) === false) {
            throw new \InvalidArgumentException("Mode '{$mode}' is not supported. Use the constants of the `UrlGenerator` to decide which mode to use.");
        }

        return $this->config[$mode].$resource;
    }

    private function formatUrl(string $url): string
    {
        return preg_replace('/(?:\/)+$/u', '', $url).'/';
    }
}
