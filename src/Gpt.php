<?php

namespace Galee\Gpt;

use Illuminate\Support\Facades\Config;
use OpenAI\Laravel\Facades\OpenAI;

class Gpt
{
    protected array $config = [];
    protected array $response = [];
    protected string $type = 'completion';

    public function __construct(
        ?array $config = null,
        ?string $type = null
    ) {
        $this->config($config ?? Config::get('gpt-laravel'));
        $this->type($type ?? $this->type);

        return $this;
    }

    public function type(string $type): Gpt
    {
        $this->type = $type;

        return $this;
    }

    public function config(array $config): Gpt
    {
        $this->config = $config;

        return $this;
    }

    public function model(string $model): Gpt
    {
        data_set($this->config, $this->type.'.defaults.model', $model);

        return $this;
    }

    public function temperature(float $temperature): Gpt
    {
        data_set($this->config, $this->type.'.defaults.temperature', $temperature);

        return $this;
    }

    public function maxTokens(int $maxTokens): Gpt
    {
        data_set($this->config, $this->type.'.defaults.max_tokens', $maxTokens);

        return $this;
    }

    public function topP(float $topP): Gpt
    {
        data_set($this->config, $this->type.'.defaults.top_p', $topP);

        return $this;
    }

    public function frequencyPenalty(float $frequencyPenalty): Gpt
    {
        data_set($this->config, $this->type.'.defaults.frequency_penalty', $frequencyPenalty);

        return $this;
    }

    public function presencePenalty(float $presencePenalty): Gpt
    {
        data_set($this->config, $this->type.'.defaults.presence_penalty', $presencePenalty);

        return $this;
    }

    public function suffix(string $suffix): Gpt
    {
        data_set($this->config, $this->type.'.defaults.suffix', $suffix);

        return $this;
    }

    public function completion(string $prompt): Gpt
    {
        $this->response = OpenAI::completions()->create(
            $this->requestPayload($prompt)
        );

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
        $attributes = (!is_array($attributes)) ? [$attributes] : $attributes;

        return array_merge($attributes, $this->config[$this->type]['defaults']);
    }
}
