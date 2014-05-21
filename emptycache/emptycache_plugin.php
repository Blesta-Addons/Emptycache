<?php
/**
 * Plugin To Allow Admins to Empty Cache .
 * 
 * @package blesta
 * @subpackage blesta.plugins.Cloud_Backup
 * @copyright Copyright (c) 2005, Naja7host SARL.
 * @link http://www.naja7host.com/ Naja7host
 */
class EmptycachePlugin extends Plugin {

	public function __construct() {
		Language::loadLang("emptycache_plugin", null, dirname(__FILE__) . DS . "language" . DS);
		
		// Load components required by this plugin
		Loader::loadComponents($this, array("Input"));
		
        // Load modules for this plugun
        Loader::loadModels($this, array("ModuleManager"));
		$this->loadConfig(dirname(__FILE__) . DS . "config.json");
	}
	
    /**
     * Performs any necessary bootstraping actions
     *
     * @param int $plugin_id The ID of the plugin being installed
     */
	public function install($plugin_id) {
		// Nothing to install
	}
	
    /**
     * Performs migration of data from $current_version (the current installed version)
     * to the given file set version
     *
     * @param string $current_version The current installed version of this plugin
     * @param int $plugin_id The ID of the plugin being upgraded
     */
	public function upgrade($current_version, $plugin_id) {
		
		// Upgrade if possible
		if (version_compare($this->getVersion(), $current_version, ">")) {
			// Handle the upgrade, set errors using $this->Input->setErrors() if any errors encountered
		}
	}
	
    /**
     * Performs any necessary cleanup actions
     *
     * @param int $plugin_id The ID of the plugin being uninstalled
     * @param boolean $last_instance True if $plugin_id is the last instance across all companies for this plugin, false otherwise
     */
	public function uninstall($plugin_id, $last_instance) {
		// Nothing to uninstall
	}

    /**
     * Returns all actions to be configured for this widget (invoked after install() or upgrade(), overwrites all existing actions)
     *
     * @return array A numerically indexed array containing:
     * 	- action The action to register for
     * 	- uri The URI to be invoked for the given action
     * 	- name The name to represent the action (can be language definition)
     */
    public function getActions() {
        return array(
            array(
                'action' => "nav_secondary_staff",
                'uri' => "plugin/emptycache/admin_main/",
                'name' => Language::_("EmptycachePlugin.title", true),
                'options' => array('parent' => "tools/")
            )
        );
    }
}
?>