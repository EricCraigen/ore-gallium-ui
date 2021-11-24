<?php

namespace Ore\GalliumUi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ore\GalliumUi\Skeleton\SkeletonClass
 */
class GalliumUiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'gallium-ui';
    }
}
