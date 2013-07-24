<?php

namespace Mgrid\Export;

use Mgrid\Export\IExport,
    Mgrid;

/**
 * Description of Xml
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Xml implements IExport
{

    /**
     *
     * @param Grid $grid 
     * @param string $title 
     */
    public static function render(Grid $grid, $title = '')
    {
        header("Content-Type: text/xml;");

        # Instancia do objeto XMLWriter
        $xml = new \XMLWriter;

        # Cria memoria para armazenar a saida
        $xml->openMemory();

        # Inicia o cabeÃ§alho do documento XML
        $xml->startDocument('1.0', 'iso-8859-1');

        # Adiciona/Inicia um Elemento / NÃ³ Pai <item>
        $xml->startElement("root");

        foreach ($grid->getResult() as $row) {
            $xml->startElement("item");
            foreach ($grid->getColumns() as $column) {

                if (!$column->getIsReportColumn())
                    continue;

                $rowValue = $column->getRender($row)->render();

                $xml->writeElement(\Core\Util\String::convertToXmlTag($column->getLabel()), $rowValue);
            }
            $xml->endElement();
        }

        # close the element
        $xml->endElement();

        # Imprime os dados armazenados
        print $xml->outputMemory(true);
    }

}
