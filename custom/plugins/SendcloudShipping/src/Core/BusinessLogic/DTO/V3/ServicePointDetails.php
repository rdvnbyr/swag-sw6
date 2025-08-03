<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class ServicePointDetails
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class ServicePointDetails extends AbstractDTO
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $postNumber;

    /**
     * @param string|null $id
     * @param string|null $postNumber
     */
    public function __construct($id, $postNumber)
    {
        $this->id = $id;
        $this->postNumber = $postNumber;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPostNumber()
    {
        return $this->postNumber;
    }

    /**
     * @param string $postNumber
     */
    public function setPostNumber($postNumber)
    {
        $this->postNumber = $postNumber;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'post_number' => $this->getPostNumber()
        );
    }
}
