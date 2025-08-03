<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class Measurement
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class Measurement extends AbstractDTO
{
    /**
     * @var Weight|null
     */
    private $weight;
    /**
     * @var Dimension|null
     */
    private $dimension;

    /**
     * @param Weight|null $weight
     * @param Dimension|null $dimension
     */
    public function __construct($weight, $dimension)
    {
        $this->weight = $weight;
        $this->dimension = $dimension;
    }

    /**
     * @return Weight|null
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param Weight|null $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return Dimension|null
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @param Dimension|null $dimension
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'dimension' => $this->getDimension() ? $this->getDimension()->toArray() : null,
            'weight' => $this->getWeight() ? $this->getWeight()->toArray() : null
        );
    }
}
