<?php

/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Zentlix to newer
 * versions in the future. If you wish to customize Zentlix for your
 * needs please refer to https://docs.zentlix.io for more information.
 */

declare(strict_types=1);

namespace Zentlix\MainBundle\UI\Http\Web\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractAdminController
{
    public function index(): Response
    {
        return $this->render('@admin/dist/index.html.twig');
    }
}