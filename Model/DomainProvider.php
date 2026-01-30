<?php

namespace CustomForm\Email\Model;

class DomainProvider
{
    private Reader $reader;

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function getDomains(): array
    {
        $data = $this->reader->read();
        return $data ?: [];
    }
}
