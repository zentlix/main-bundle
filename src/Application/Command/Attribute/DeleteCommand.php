<?php

/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Zentlix to newer
 * versions in the future. If you wish to customize Zentlix for your
 * needs please refer to https://docs.zentlix.io for more information.
 */

declare(strict_types=1);

namespace Zentlix\MainBundle\Application\Command\Attribute;

use Symfony\Component\Validator\Constraints;
use Zentlix\MainBundle\Domain\Attribute\Entity\Attribute;
use Zentlix\MainBundle\Infrastructure\Share\Bus\CommandInterface;
use Zentlix\MainBundle\Infrastructure\Share\Bus\DeleteCommandInterface;

class DeleteCommand implements DeleteCommandInterface, CommandInterface
{
    /** @Constraints\NotBlank() */
    public Attribute $attribute;

    public function __construct(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }
}