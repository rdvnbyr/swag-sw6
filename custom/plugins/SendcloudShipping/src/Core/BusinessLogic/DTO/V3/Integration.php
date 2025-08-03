<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class Integration
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class Integration extends AbstractDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId()
        );
    }
}
