<?php
namespace Mgrid\Column\Render;

/**
 * Description of ARender
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
abstract class ARender implements IRender
{

    /**
     * row used by render
     * @var array
     */
    protected $row = array();
    /**
     * Column that uses the render
     * @var Mgrid\Column
     */
    protected $column = null;
    /**
     * render options
     */
    protected $options;

    /**
     * constructor may set options
     * @param array $options 
     */
    public function __construct(array $options = array())
    {
	if (isset($options))
	    $this->options = $options;
    }

    /**
     * sets a row to be parsed by render
     * @param array $row 
     * @return ARender 
     */
    public function setRow(array $row)
    {
	$this->row = $row;
	return $this;
    }

    /**
     * returns the row
     * @return array
     */
    public function getRow()
    {
	return $this->row;
    }

    /**
     * returns column that uses the render
     */
    public function getColumn()
    {
	return $this->column;
    }

    /**
     * sets column that uses the render
     * @param Mgrid\Column $column
     * @return ARender 
     */
    public function setColumn(\Mgrid\Column $column)
    {
	$this->column = $column;
	return $this;
    }

    /**
     *
     * @return type 
     */
    public function getView()
    {
	//get view
	$viewRenderer = \Zend_Controller_Action_HelperBroker::getExistingHelper('ViewRenderer');
	return $viewRenderer->view;        
    }
}
