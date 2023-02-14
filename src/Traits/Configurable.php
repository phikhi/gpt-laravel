<?php

namespace Galee\Gpt\Traits;

use Galee\Gpt\Gpt;

trait Configurable
{
    protected array $config = [];

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
}
