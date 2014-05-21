<?php
/**
 * Plugin To Allow Admins to Empty Cache .
 * 
 * @package blesta
 * @subpackage blesta.plugins.Cloud_Backup
 * @copyright Copyright (c) 2005, Naja7host SARL.
 * @link http://www.naja7host.com/ Naja7host
 */
class EmptycacheController extends AppController {

	/**
	 * Setup
	 */
    public function preAction() {
		$this->structure->setDefaultView(APPDIR);
		parent::preAction();
		
		// Override default view directory
		// $this->view->view = "default";
		// $this->orig_structure_view = $this->structure->view;
		// $this->structure->view = "default";	

    }
}
?>