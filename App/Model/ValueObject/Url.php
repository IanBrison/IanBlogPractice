<?php

namespace App\Model\ValueObject;

class Url {

    private $scheme; // https or http
    private $domain; // the host part of the url
    private $path; // the path part of the url
    private $params; // the query part of the url. it stores like 'paramKey' => 'paramValue' associative array

    private function __construct(string $scheme, string $domain, string $path, array $params) {
        $this->scheme = $scheme;
        $this->domain = $domain;
        $this->path = $path;
        $this->params = $params;
    }

    public static function createFromFullString(string $fullUrl): self {
    	$parsedUrl = parse_url($fullUrl);
    	$scheme = $parsedUrl['scheme'] ?? 'http';
    	$domain = $parsedUrl['host'] ?? 'localhost';
    	$path = $parsedUrl['path'] ?? '';
    	$queries = explode('&', $parsedUrl['query']);
    	$params = array_map(function($query) {
    		$explodedQuery = explode('=', $query);
    		return [
    			'paramKey' => $explodedQuery[0],
			    'paramValue' => $explodedQuery[1]
			    ];
	    }, $queries);
    	$params = array_column($params, 'paramValue', 'paramKey');
        return new self($scheme, $domain, $path, $params);
    }

    public function fullString(): string {
        return $this->scheme() . '://'. $this->domain() . $this->path() . $this->paramsInString();
    }

    public function scheme(): string {
        return $this->scheme;
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
        if (empty($this->params())) {
	        return '';
        }
        return '?' . http_build_query($this->params());
    }
}
