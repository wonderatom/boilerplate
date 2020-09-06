<?php

namespace App\Domain\Collection;

use App\Domain\Contract\ConditionInterface;

class ConditionCollection
{
    private $conditions;

    public function __construct(array $conditions = [])
    {
        foreach ($conditions as $condition) {
            $this->add($condition);
        }
    }

    public function add(ConditionInterface $condition): void
    {
        $this->conditions[] = $condition;
    }

    /**
     * @return ConditionInterface[]
     */
    public function all(): array
    {
        return $this->conditions;
    }

    public function has(ConditionInterface $condition): bool
    {
        return in_array($condition, $this->conditions);
    }
}
