<?php
namespace Failx\Thierolf\Domain\Model;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */



class Image extends \WapplerSystems\WsFlexslider\Domain\Model\Image
{

    /**
     * zoom
     *
     * @var boolean
     */
    protected $zoom;

    /**
     * Returns the zoom
     *
     * @return boolean $zoom
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * Sets the zoom
     *
     * @param boolean $zoom
     * @return void
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }
}
