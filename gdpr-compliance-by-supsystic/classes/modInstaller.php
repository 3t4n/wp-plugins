<?php
class modInstallerGdprsup {
    static private $_current = array();
    /**
     * Install new moduleGdprsup into plugin
     * @param string $module new moduleGdprsup data (@see classes/tables/modules.php)
     * @param string $path path to the main plugin file from what module is installed
     * @return bool true - if install success, else - false
     */
    static public function install($module, $path) {
        $exPlugDest = explode('plugins', $path);
        if(!empty($exPlugDest[1])) {
            $module['ex_plug_dir'] = str_replace(DS, '', $exPlugDest[1]);
        }
        $path = $path. DS. $module['code'];
        if(!empty($module) && !empty($path) && is_dir($path)) {
            if(self::isModule($path)) {
                $filesMoved = false;
                if(empty($module['ex_plug_dir']))
                    $filesMoved = self::moveFiles($module['code'], $path);
                else
                    $filesMoved = true;     //Those modules doesn't need to move their files
                if($filesMoved) {
                    if(frameGdprsup::_()->getTable('modules')->exists($module['code'], 'code')) {
                        frameGdprsup::_()->getTable('modules')->delete(array('code' => $module['code']));
                    }
					if($module['code'] != 'license')
						$module['active'] = 0;
                    frameGdprsup::_()->getTable('modules')->insert($module);
                    self::_runModuleInstall($module);
                    self::_installTables($module);
                    return true;
                } else {
                    errorsGdprsup::push(sprintf(__('Move files for %s failed'), $module['code']), errorsGdprsup::MOD_INSTALL);
                }
            } else
                errorsGdprsup::push(sprintf(__('%s is not plugin module'), $module['code']), errorsGdprsup::MOD_INSTALL);
        }
        return false;
    }
    static protected function _runModuleInstall($module, $action = 'install') {
        $moduleLocationDir = GDPRSUP_MODULES_DIR;
        if(!empty($module['ex_plug_dir']))
            $moduleLocationDir = utilsGdprsup::getPluginDir( $module['ex_plug_dir'] );
        if(is_dir($moduleLocationDir. $module['code'])) {
			if(!class_exists($module['code']. strFirstUpGdprsup(GDPRSUP_CODE))) {
				importClassGdprsup($module['code']. strFirstUpGdprsup(GDPRSUP_CODE), $moduleLocationDir. $module['code']. DS. 'mod.php');
			}
            $moduleClass = toeGetClassNameGdprsup($module['code']);
            $moduleObj = new $moduleClass($module);
            if($moduleObj) {
                $moduleObj->$action();
            }
        }
    }
    /**
     * Check whether is or no module in given path
     * @param string $path path to the module
     * @return bool true if it is module, else - false
     */
    static public function isModule($path) {
        return true;
    }
    /**
     * Move files to plugin modules directory
     * @param string $code code for module
     * @param string $path path from what module will be moved
     * @return bool is success - true, else - false
     */
    static public function moveFiles($code, $path) {
        if(!is_dir(GDPRSUP_MODULES_DIR. $code)) {
            if(mkdir(GDPRSUP_MODULES_DIR. $code)) {
                utilsGdprsup::copyDirectories($path, GDPRSUP_MODULES_DIR. $code);
                return true;
            } else 
                errorsGdprsup::push(__('Cannot create module directory. Try to set permission to '. GDPRSUP_MODULES_DIR. ' directory 755 or 777', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
        } else
            return true;
        return false;
    }
    static private function _getPluginLocations() {
        $locations = array();
        $plug = reqGdprsup::getVar('plugin');
        if(empty($plug)) {
            $plug = reqGdprsup::getVar('checked');
            $plug = $plug[0];
        }
        $locations['plugPath'] = plugin_basename( trim( $plug ) );
        $locations['plugDir'] = dirname(WP_PLUGIN_DIR. DS. $locations['plugPath']);
		$locations['plugMainFile'] = WP_PLUGIN_DIR. DS. $locations['plugPath'];
        $locations['xmlPath'] = $locations['plugDir']. DS. 'install.xml';
		$locations['extendModPath'] = $locations['plugDir']. DS. 'install.php';
        return $locations;
    }
    static private function _getModulesFromXml($xmlPath) {
        if($xml = utilsGdprsup::getXml($xmlPath)) {
            if(isset($xml->modules) && isset($xml->modules->mod)) {
                $modules = array();
                $xmlMods = $xml->modules->children();
                foreach($xmlMods->mod as $mod) {
                    $modules[] = $mod;
                }
                if(empty($modules))
                    errorsGdprsup::push(__('No modules were found in XML file', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
                else
                    return $modules;
            } else
                errorsGdprsup::push(__('Invalid XML file', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
        } else
            errorsGdprsup::push(__('No XML file were found', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
        return false;
    }
	static private function _getExtendModules($locations) {
		$modules = array();
		$isExtendModPath = file_exists($locations['extendModPath']);
		$modulesList = $isExtendModPath ? include $locations['extendModPath'] : self::_getModulesFromXml($locations['xmlPath']);
		if(!empty($modulesList)) {
			foreach($modulesList as $mod) {
				$modData = $isExtendModPath ? $mod : utilsGdprsup::xmlNodeAttrsToArr($mod);
				array_push($modules, $modData);
			}
			if(empty($modules))
				errorsGdprsup::push(__('No modules were found in installation file', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
			else
				return $modules;
		} else
			errorsGdprsup::push(__('No installation file were found', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
		return false;
	}
    /**
     * Check whether modules is installed or not, if not and must be activated - install it
     * @param array $codes array with modules data to store in database
     * @param string $path path to plugin file where modules is stored (__FILE__ for example)
     * @return bool true if check ok, else - false
     */
    static public function check($extPlugName = '') {
		if(GDPRSUP_TEST_MODE) {
			add_action('activated_plugin', array(frameGdprsup::_(), 'savePluginActivationErrors'));
		}
        $locations = self::_getPluginLocations();
		if($modules = self::_getExtendModules($locations)) {
			foreach($modules as $m) {
				if(!empty($m)) {
					//If module Exists - just activate it, we can't check this using frameGdprsup::moduleExists because this will not work for multy-site WP
					if(frameGdprsup::_()->getTable('modules')->exists($m['code'], 'code') /*frameGdprsup::_()->moduleExists($m['code'])*/) {
						self::activate($m);
					} else {                                           //  if not - install it
						if(!self::install($m, $locations['plugDir'])) {
							errorsGdprsup::push(sprintf(__('Install %s failed'), $m['code']), errorsGdprsup::MOD_INSTALL);
						}
					}
				}
			}
		} else
            errorsGdprsup::push(__('Error Activate module', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
        if(errorsGdprsup::haveErrors(errorsGdprsup::MOD_INSTALL)) {
            self::displayErrors();
            return false;
        }
		update_option(GDPRSUP_CODE. '_full_installed', 1);
        return true;
    }
    /**
	 * Public alias for _getCheckRegPlugs()
	 */
	/**
	 * We will run this each time plugin start to check modules activation messages
	 */
	static public function checkActivationMessages() {

	}
    /**
     * Deactivate module after deactivating external plugin
     */
    static public function deactivate() {
        $locations = self::_getPluginLocations();
		if($modules = self::_getExtendModules($locations)) {
			foreach($modules as $m) {
				if(frameGdprsup::_()->moduleActive($m['code'])) { //If module is active - then deacivate it
					if(frameGdprsup::_()->getModule('options')->getModel('modules')->put(array(
						'id' => frameGdprsup::_()->getModule($m['code'])->getID(),
						'active' => 0,
					))->error) {
						errorsGdprsup::push(__('Error Deactivation module', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
					}
				}
			}
		}
        if(errorsGdprsup::haveErrors(errorsGdprsup::MOD_INSTALL)) {
            self::displayErrors(false);
            return false;
        }
        return true;
    }
    static public function activate($modDataArr) {
		if(!empty($modDataArr['code']) && !frameGdprsup::_()->moduleActive($modDataArr['code'])) { //If module is not active - then acivate it
			if(frameGdprsup::_()->getModule('options')->getModel('modules')->put(array(
				'code' => $modDataArr['code'],
				'active' => 1,
			))->error) {
				errorsGdprsup::push(__('Error Activating module', GDPRSUP_LANG_CODE), errorsGdprsup::MOD_INSTALL);
			} else {
				$dbModData = frameGdprsup::_()->getModule('options')->getModel('modules')->get(array('code' => $modDataArr['code']));
				if(!empty($dbModData) && !empty($dbModData[0])) {
					$m['ex_plug_dir'] = $dbModData[0]['ex_plug_dir'];
				}
				self::_runModuleInstall($modDataArr, 'activate');
			}
		}
    } 
    /**
     * Display all errors for module installer, must be used ONLY if You realy need it
     */
    static public function displayErrors($exit = true) {
        $errors = errorsGdprsup::get(errorsGdprsup::MOD_INSTALL);
        foreach($errors as $e) {
            echo '<b style="color: red;">'. $e. '</b><br />';
        }
        if($exit) exit();
    }
    static public function uninstall() {
        $locations = self::_getPluginLocations();
		if($modules = self::_getExtendModules($locations)) {
			foreach($modules as $m) {
				self::_uninstallTables($m);
				frameGdprsup::_()->getModule('options')->getModel('modules')->delete(array('code' => $m['code']));
				utilsGdprsup::deleteDir(GDPRSUP_MODULES_DIR. $m['code']);
			}
		}
    }
    static protected  function _uninstallTables($module) {
        if(is_dir(GDPRSUP_MODULES_DIR. $module['code']. DS. 'tables')) {
            $tableFiles = utilsGdprsup::getFilesList(GDPRSUP_MODULES_DIR. $module['code']. DS. 'tables');
            if(!empty($tableNames)) {
                foreach($tableFiles as $file) {
                    $tableName = str_replace('.php', '', $file);
                    if(frameGdprsup::_()->getTable($tableName))
                        frameGdprsup::_()->getTable($tableName)->uninstall();
                }
            }
        }
    }
    static public function _installTables($module, $action = 'install') {
		$modDir = empty($module['ex_plug_dir']) ? 
            GDPRSUP_MODULES_DIR. $module['code']. DS : 
            utilsGdprsup::getPluginDir($module['ex_plug_dir']). $module['code']. DS; 
        if(is_dir($modDir. 'tables')) {
            $tableFiles = utilsGdprsup::getFilesList($modDir. 'tables');
            if(!empty($tableFiles)) {
                frameGdprsup::_()->extractTables($modDir. 'tables'. DS);
                foreach($tableFiles as $file) {
                    $tableName = str_replace('.php', '', $file);
                    if(frameGdprsup::_()->getTable($tableName))
                        frameGdprsup::_()->getTable($tableName)->$action();
                }
            }
        }
    }
}