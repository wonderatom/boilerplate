<?php

namespace App\Domain\Collection;

use App\Domain\Contract\AbilityInterface;

class AbilityCollection
{
    private $abilities;

    public function __construct(array $abilities)
    {
        foreach ($abilities as $ability) {
            $this->add($ability);
        }
    }

    public function add(AbilityInterface $ability): void
    {
        $this->abilities[] = $ability;
    }

    /**
     * @return AbilityInterface[]
     */
    public function all(): array
    {
        return $this->abilities;
    }

    public function has(AbilityInterface $ability): bool
    {
        return in_array($ability, $this->abilities);
    }
}