<?php

declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\AmazonPay\Components\Config\Hydrator;

use Swag\AmazonPay\Components\Config\Struct\AmazonPayConfigStruct;

interface ConfigHydratorInterface
{
    public function hydrate(array $config): AmazonPayConfigStruct;
}
