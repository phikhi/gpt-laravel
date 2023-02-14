<?php

namespace Galee\Gpt;

use Galee\Gpt\Traits\Configurable;
use Illuminate\Support\Facades\Config;
use OpenAI;
use OpenAI\Client;

class Gpt
{
    use Configurable;

    protected array $response = [];

    protected string $type = 'completion';

    protected Client $client;

    public function __construct(
        ?array $config = null,
        ?string $type = null
    ) {
        $this->config($config ?? Config::get('gpt-laravel'));
        $this->type($type ?? $this->type);
        $this->setClient();
    }

    private function setClient(): void
    {
        $this->client = OpenAI::client(
            $this->config['api_key'],
            $this->config['organization']
        );
    }

    public function type(string $type): Gpt
    {
        $this->type = $type;

        return $this;
    }

    public function completion(string $prompt): Gpt
    {
        $this->response = $this->client->completions()->create(
            $this->requestPayload($prompt)
        )->toArray();

        return $this;
    }

    public function text(): ?string
    {
        return data_get($this->response, 'choices.0.text');
    }

    public function usage(): int
    {
        return data_get($this->response, 'usage.total_tokens', 0);
    }

    public function response(): array
    {
        return $this->response;
    }

    protected function requestPayload(mixed $attributes): array
    {
        $attributes = (! is_array($attributes)) ? [$attributes] : $attributes;

        return array_merge($attributes, $this->config[$this->type]['defaults']);
    }
}
