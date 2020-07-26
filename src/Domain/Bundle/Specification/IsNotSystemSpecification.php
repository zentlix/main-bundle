<?php

/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Zentlix to newer
 * versions in the future. If you wish to customize Zentlix for your
 * needs please refer to https://docs.zentlix.io for more information.
 */

declare(strict_types=1);

namespace Zentlix\MainBundle\Domain\Bundle\Specification;

use Symfony\Contracts\Translation\TranslatorInterface;
use Zentlix\MainBundle\Domain\Shared\Specification\AbstractSpecification;
use Zentlix\MainBundle\Domain\Bundle\Repository\BundleRepository;

final class IsNotSystemSpecification extends AbstractSpecification
{
    private BundleRepository $bundleRepository;
    private TranslatorInterface $translator;

    public function __construct(BundleRepository $bundleRepository, TranslatorInterface $translator)
    {
        $this->bundleRepository = $bundleRepository;
        $this->translator = $translator;
    }

    public function isNotSystem(int $id): bool
    {
        return $this->isSatisfiedBy($id);
    }

    public function isSatisfiedBy($value): bool
    {
        $module = $this->bundleRepository->get($value);

        return !$module->isSystem();
    }

    public function __invoke(int $id)
    {
        return $this->isNotSystem($id);
    }
}