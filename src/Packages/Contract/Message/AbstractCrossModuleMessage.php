<?php

namespace App\Packages\Contract\Message;

use App\Packages\Contract\Model\BaseUser;

abstract class AbstractCrossModuleMessage
{
    public function getVersion(): int
    {
        return 1;
    }

    abstract public function getPayload(): array;
    abstract public function getInitiatorUser(): ?BaseUser;
    abstract public function getContext(): ?MessageContext;

}