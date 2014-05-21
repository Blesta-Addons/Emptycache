<?php
/**
 * Plugin To Allow Admins to Empty Cache .
 * 
 * @package blesta
 * @subpackage blesta.plugins.Cloud_Backup
 * @copyright Copyright (c) 2005, Naja7host SARL.
 * @link http://www.naja7host.com/ Naja7host
 */
class AdminMain extends AppController {

    /**
     * Performs necessary initialization
     */
    private function init() {
        // Require login
        $this->requireLogin();

        Language::loadLang("emptycache_plugin", null, PLUGINDIR . "emptycache" . DS . "language" . DS);
		
        // Set the plugin ID
        $this->plugin_id = (isset($this->get[0]) ? $this->get[0] : null);

        // Set the company ID
        $this->company_id = Configure::get("Blesta.company_id");

		// Restore structure view location of the admin portal
		$this->structure->setDefaultView(APPDIR);
		$this->structure->setView(null, $this->structure->view);
		// $this->view->setView(null, "emptycache.default");
		
		$this->staff_id = $this->Session->read("blesta_staff_id");
	
    }
	
	/**
	 * Returns the view to be rendered when managing this plugin
	 */
    public function index() {	
		$this->init();
		// $vars = array();
		$cache = Cache::fetchCache( "nav_staff_group_" . $this->staff_id, $this->company_id . DS . "nav" . DS ) ; 
		$vars = array(
			'plugin_id'=>$this->plugin_id,
			'fetchCache'=>Cache::fetchCache( "nav_staff_group_" . $this->staff_id, $this->company_id . DS . "nav" . DS )
		);
			
		if (!empty($this->post)) {
			Cache::clearCache("nav_staff_group_" . $this->staff_id, $this->company_id . DS . "nav" . DS);
			$this->setMessage("message", Language::_("EmptycachePlugin.!success", true));
			//print_r($this->post);
		}			
			
		// Set the view to render for all actions under this controller
		$this->view->setView(null, "emptycache.default");
		$this->set("cache", $cache);
		return $this->partial("admin_main", $vars);

    }
}
?>