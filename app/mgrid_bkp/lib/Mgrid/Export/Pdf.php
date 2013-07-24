<?php

namespace Mgrid\Export;

use Mgrid\Export\IExport,
    Mgrid;

/**
 * Description of Pdf
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Pdf implements IExport
{

    /**
     *
     * @param Grid $grid 
     * @param string $title 
     */
    public static function render(Grid $grid, $title = '')
    {
        header("Content-Type: application/pdf;");

        $colsLength = array();
        $pageCharWidth = 0;
        $numRows = 0;
        $fatorTitle = 2.39;
        $fatorText = 2.15;

        // calc size of the page, columns and rows
        foreach ($grid->getColumns() as $columns) {
            if (!$columns->getIsReportColumn())
                continue;

            $size = (strlen($columns->getLabel()) * $fatorTitle);

            foreach ($grid->result as $row) {

                if ($row[$columns->getIndex()]) {
                    $rowValue = $columns->getRender($row)->render();

                    $size = ($size > (strlen($rowValue) * $fatorText)) ? $size : (strlen($rowValue) * $fatorText);
                }
            }

            $pageCharWidth += $colsLength[$columns->getIndex()] = $size;
        }

        $pageOrientation = ($pageCharWidth > 195) ? 'L' : 'P';

        $pdf = new \MDN\Module\Admin\Pdf($pageOrientation, 'mm', 'A4');

        // header
        $pdf->setTitle($title)
                ->setLabelHeight(5)
                ->setColHeight(6)
                ->setNumRows(count($grid->result));

        foreach ($grid->getColumns() as $columns) {
            if (!$columns->getIsReportColumn())
                continue;

            $label = $columns->getLabel();
            $pdf->addLabel($columns->getIndex(), $colsLength[$columns->getIndex()], $columns->getLabel(), 'B', 0, $columns->getAlign());
        }
        $pdf->addLabel(1, 1, '', 0, 1, 'R', false, '');

        foreach ($grid->getResult() as $row) {
            foreach ($grid->getColumns() as $columns) {
                if (!$columns->getIsReportColumn())
                    continue;

                $rowValue = $columns->getRender($row)->render();
                $pdf->addCol($columns->getIndex(), $colsLength[$columns->getIndex()], $rowValue, 0, 0, $columns->getAlign(), false, '', $columns->getHasTotal());
            }
            $pdf->addCol(1, 1, '', 0, 1, 'R', false, '');
        }

        // page
        $pdf->AddPage()
                ->render()
                ->Output();
    }

}
