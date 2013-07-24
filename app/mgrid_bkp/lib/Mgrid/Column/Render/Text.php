<?php

namespace Mgrid\Column\Render;

use Mgrid\Column\Render;

/**
 * Description of Text
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Text extends Render\ARender implements Render\IRender
{

    /**
     *
     * @return string
     */
    public function render()
    {
	$row = $this->getRow();
	$index = $this->getColumn()->getIndex();
	return $row[$index];
    }

}