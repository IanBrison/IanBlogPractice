<?php

namespace App\Model\ValueObject;

class Url {

    private $protocol;
    private $domain;
    private $path;
    private $params;

    private function __construct(string $protocol, string $domain, string $path, array $params) {
        $this->protocol = $protocol;
        $this->domain = $domain;
        $this->path = $path;
        $this->params = $params;
    }

    public static function constructFromFullString(string $fullUrl): self {
        return new self('', '', $fullUrl, []);
    }

    public function fullString(): string {
        return $this->protocol . $this->domain . $this->path . $this->paramsInString();
    }

    public function protocol(): string {
        return $this->protocol;
    }

    public function domain(): string {
        return $this->domain;
    }

    public function path(): string {
        return $this->path;
    }

    public function params(): array {
        return $this->params;
    }

    private function paramsInString(): string {
        if (empty($this->params)) {
            return '';
        }
        $paramsStringArray = [];
        foreach ($this->params as $key => $value) {
            $paramsStringArray[] = $key . '=' . $value;
        }
        return '?' . implode('&', $paramsStringArray);
    }
}
