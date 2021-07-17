<?php
namespace Ovicko\CycleOrmExample;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
/**
 * @Entity(
 *     table    = "agent_level"
 * )
 */
class AgentLevel
{
    /** @Cycle\Column(type = "primary") */
    protected $id;

    /** @Column(type = "string(20)", name = "level_name") */
    protected $name;

    /** @Column(type = "double", name = "commission_rate") */
    protected $rate;

    /** @Column(type = "integer", name = "status") */
    protected $status;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

}