<?php

class VisibilityHelper
{
    protected $settings;
    protected $event;

    function __construct(SettingRepository $settings, AbolSeatingWidget__Model_Event $event)
    {
        $this->setSettings($settings);
        $this->setEvent($event);
    }

    function determineVisibility()
    {
        if($this->getSettings()->getAlwaysHidden())
        {
            return false;
        }

        $showWithoutEvents = $this->getSettings()->getDisplayWithoutEvents();
        if(!$this->getEvent()->getBookingOpen() && !$showWithoutEvents)
        {
            return false;
        }

        $performanceCount = count($this->getEvent()->getPerformances());
        if($performanceCount == 0 && !$showWithoutEvents)
        {
            return false;
        }

        return true;
    }

    public function setSettings($settings)
    {
        $this->settings = $settings;
        return $this;
    }

    /**
     * @return SettingRepository
     */
    public function getSettings()
    {
        return $this->settings;
    }

    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return AbolSeatingWidget__Model_Event
     */
    public function getEvent()
    {
        return $this->event;
    }
}