<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class SongSearch
{
    /**
     * @var ArrayCollection
     */
    private $styles;

    /**
     * @var string
     */
    private $titles;

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

    /**
     * @return string
     */
    public function getTitles(): ?string
    {
        return $this->titles;
    }

    /**
     * @param string $titles
     */
    public function setTitles(string $titles): void
    {
        $this->titles = $titles;
    }

    public function __toString()
    {
        return $this->titles;
    }

}