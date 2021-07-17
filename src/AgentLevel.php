<?php
namespace Ovicko\CycleOrmExample;

use Cycle\Annotated\Annotation\Entity;

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
}