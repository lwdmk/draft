<?php

namespace App\Packages\Contract\Message;

class MessageContext
{
    private $userAgent;

    private function __construct(array $data)
    {
        $this->userAgent = $data['userAgent'] ?? null;
    }

    public function isEmpty(): bool
    {
        return empty($this->userAgent);
    }

    public static function createFromData(array $data): self
    {
        return new MessageContext($data);
    }

}