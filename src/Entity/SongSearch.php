<?php
/**
 * User: davidf
 * Date: 31/01/2019
 * Time: 11:44
 */

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class SongSearch
{
    /**
     * @var ArrayCollection
     */
    private $styles;

    public function __construct()
    {
        $this->styles = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getStyles() : ArrayCollection
    {
        return $this->styles;
    }

    /**
     * @param ArrayCollection $styles
     */
    public function setStyles(ArrayCollection $styles): void
    {
        $this->styles = $styles;
    }
}