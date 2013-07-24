<?php

namespace Mgrid\Column\Filter\Render;

use Mgrid\Column\Filter\Render;

/**
 * Description of Text
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Text extends Render\ARender implements Render\IRender {
    
    /**
     *
     * @return string
     */
    public function render()
    {        
        $attributes = $this->getAttributes();
	
        //atributos customizados
        $attributes['size'] = isset($attributes['size']) ? $attributes['size'] : false;
        
        return new \Zend_Form_Element_Text($this->getFieldIndex(), 
                $attributes
                );
    }

}