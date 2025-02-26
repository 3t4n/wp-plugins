<?php

namespace AIPT\Core;

class FsManager {
    private static $instance = null;
    private $fs;
    private const PLAN_STATE_TRANSIENT = 'aipt_current_plan_state';

    private function __construct() {
        $this->fs = aipt_fs();
        

        add_action('admin_init', [$this, 'checkPlanChange']);
        

        if (false === get_transient(self::PLAN_STATE_TRANSIENT)) {
            $this->savePlanState();
        }
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function getCurrentPlanState(): array {
        return [
            'plan' => $this->getPlanType(),
            'is_registered' => $this->is_registered(),
            'license_id' => $this->getLicenseId()
        ];
    }

    private function savePlanState(): void {
        set_transient(self::PLAN_STATE_TRANSIENT, $this->getCurrentPlanState());
    }

    public function checkPlanChange(): void {
        $oldState = get_transient(self::PLAN_STATE_TRANSIENT);
        $currentState = $this->getCurrentPlanState();
        

        if ($oldState && 
            ($oldState['plan'] !== $currentState['plan'] || 
             $oldState['is_registered'] !== $currentState['is_registered'] ||
             $oldState['license_id'] !== $currentState['license_id'])) {
            
            
            try {
                $ctrlManager = CtrlManager::getInstance();
                $ctrlManager->handlePlanChange();
            } catch (\Exception $e) {
            }
            

            $this->savePlanState();
        }
    }

    public function is_registered(): bool {
        return $this->fs && $this->fs->is_registered();
    }

    public function getPlanType(): string {
        if (!$this->is_registered()) {
            return 'free';
        }
        
        if ($this->fs->is_plan_or_trial('business')) {
            return 'business';
        }
        
        if ($this->fs->is_plan_or_trial('pro')) {
            return 'pro';
        }
        
        return 'free';
    }

    public function getSiteId(): string {
        if (!$this->is_registered()) {
            return '';
        }
        return (string)$this->fs->get_site()->id;
    }

    public function getPluginId(): string {
        if (!$this->fs) {
            return '';
        }
        return (string)$this->fs->get_id();
    }

    public function getLicenseId(): string {
        if (!$this->is_registered() || !$this->fs->has_active_valid_license()) {
            return '';
        }
        return (string)$this->fs->_get_license()->id;
    }

    public function hasBusinessFeature(): bool {
        return $this->is_registered() && $this->fs->is_plan_or_trial('business');
    }

    public function hasProFeature(): bool {
        return $this->is_registered() && ($this->fs->is_plan_or_trial('pro') || $this->fs->is_plan_or_trial('business'));
    }

    public function showUpgradeNotice(): void {
        if (!$this->is_registered() || !$this->fs->is_premium()) {
            $this->fs->add_sticky_admin_message(
                'This feature requires a premium license. Please upgrade to continue.',
                'upgrade_notice',
                'Update Required'
            );
        }
    }
} 