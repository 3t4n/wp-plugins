<?php

/**
 * Settings repository class,
 * Allows for all settings to be aggregated into a single
 * object, Makes for significantly easier retrieval and manipulation.
 * 
 * PLEASE NOTE - Any additional inputs created must have a PROTECTED class property,
 * And their relevant getters and setters, This will allow it to be used on the view for the widget.
 */
class SettingRepository
{
    protected $groupShortName; # Short name of the theatre group running the performances

    protected $bookingImageEnabled; # Show the booking image

    protected $bookingImagePath; # The path to the booking image

    protected $displayWithoutEvents; # Show the widget even if there's no events on

    protected $alwaysHidden; # Completely hide the widget

    protected $displayBookingLink; # Show a link to the user's booking page

    protected $bookingPageId; # ID Of the user's booking page

    protected $displayShowName; # Show the name of the active event

    protected $displayPerformances; # Display the individual performances of the show

    protected $userCSS; # User defined CSS Overrides

    public function getGroupShortName()
    {
        return $this->groupShortName;
    }

    public function setGroupShortName($groupShortName)
    {
        $this->groupShortName = $groupShortName;
        return $this;
    }

    public function getBookingImageEnabled()
    {
        return $this->bookingImageEnabled;
    }

    public function setBookingImageEnabled($bookingImageEnabled)
    {
        $this->bookingImageEnabled = $bookingImageEnabled;
        return $this;
    }

    public function getBookingImagePath()
    {
        return $this->bookingImagePath;
    }

    public function setBookingImagePath($bookingImagePath)
    {
        $this->bookingImagePath = $bookingImagePath;
        return $this;
    }

    public function getDisplayWithoutEvents()
    {
        return $this->displayWithoutEvents;
    }

    public function setDisplayWithoutEvents($displayWithoutEvents)
    {
        $this->displayWithoutEvents = $displayWithoutEvents;
        return $this;
    }

    public function getAlwaysHidden()
    {
        return $this->alwaysHidden;
    }

    public function setAlwaysHidden($alwaysHidden)
    {
        $this->alwaysHidden = $alwaysHidden;
        return $this;
    }

    public function getDisplayBookingLink()
    {
        return $this->displayBookingLink;
    }

    public function setDisplayBookingLink($displayBookingLink)
    {
        $this->displayBookingLink = $displayBookingLink;
        return $this;
    }

    public function getBookingPageId()
    {
        return $this->bookingPageId;
    }

    public function setBookingPageId($bookingPageId)
    {
        $this->bookingPageId = $bookingPageId;
        return $this;
    }

    public function getDisplayShowName()
    {
        return $this->displayShowName;
    }

    public function setDisplayShowName($displayShowName)
    {
        $this->displayShowName = $displayShowName;
        return $this;
    }

    public function getDisplayPerformances()
    {
        return $this->displayPerformances;
    }

    public function setDisplayPerformances($displayPerformances)
    {
        $this->displayPerformances = $displayPerformances;
        return $this;
    }

    public function getUserCss()
    {
        return $this->userCSS;
    }

    public function setUserCSS($userCSS)
    {
        $this->userCSS = $userCSS;
    }
}