<?php

namespace Mgrid\Column\Render;

use Mgrid\Column\Render;

/**
 * Description of Text
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Link extends Render\ARender implements Render\IRender
{
    /**
     *
     * @return string
     */
    public function render()
    {
	extract($this->options);
	$row = $this->getRow();
	$html = '<a href="' . $row[$href] . '">' . $row[$label] . '</a>';
	return $html;
    }

}

