<?php

namespace CustomForm\Email\Model;

class Reader
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function read(): array
    {
        $file = __DIR__ . '/../etc/' . $this->fileName;

        if (!file_exists($file)) {
            return [];
        }

        $xml = simplexml_load_file($file);
        if (!$xml || !isset($xml->names->name)) {
            return [];
        }

        $domains = [];
        foreach ($xml->names->name as $domain) {
            $domains[] = (string)$domain;
        }

        return $domains;
    }
}
