<?php
namespace App\Service\PokeApi;

class Builder 
{
    public function getIdFromUrl(string $url): int
    {
        preg_match('#/([^/]+)/$#', $url, $matches);
        return $matches[1];
    }

    public function getIdFromUrlProperty(array $data): int 
    {
        return $this->getIdFromUrl($data['url']);
    }
}