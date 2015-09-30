<?php

namespace Tale\Jade\Util;

trait PathTrait
{

    private $_path = null;

    public function hasPath()
    {

        return $this->_path !== null;
    }

    /**
     * @return string|null
     */
    public function getPath()
    {

        return $this->_path;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {

        $this->_path = $path;

        return $this;
    }

}