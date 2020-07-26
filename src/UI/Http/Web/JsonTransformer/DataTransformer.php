<?php

/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Zentlix to newer
 * versions in the future. If you wish to customize Zentlix for your
 * needs please refer to https://docs.zentlix.io for more information.
 */

declare(strict_types=1);

namespace Zentlix\MainBundle\UI\Http\Web\JsonTransformer;

use Symfony\Component\Form\FormInterface;

class DataTransformer extends AbstractTransformer
{
    public function transform(FormInterface $form, array $extensions = [], $widget = null)
    {
        $schema = ['type' => 'data'];
        $schema = $this->addCommonSpecs($form, $schema, $extensions, $widget);
        $schema['value'] = $form->getData();


        if($form->getErrors()->count()) {
            foreach ($form->getErrors() as $error) {
                $schema['errors'][] = $error->getMessage();
            }
        }

        return $schema;
    }
}