<?php

namespace Mgrid\Column\Render;

use Mgrid\Column\Render,
    Core\Util\String;

/**
 * Adiciona mascara de CPF ou CNPJ conforme a string enviada e.g. 12345678901 gerando 123.456.789.01 ou e.g. 12345678901234 gerando 12.345.678/9012-34
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class CpfCnpj extends Render\ARender implements Render\IRender
{

    /**
     *
     * @return string
     */
    public function render()
    {
        $row = $this->getRow();
        $index = $this->getColumn()->getIndex();

        if ($row[$index] != null) {
            return String::maskCpfCnpj($row[$index]);
        }
    }

}