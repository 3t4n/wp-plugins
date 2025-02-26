<?php

/**
 * Event data model.
 * Represents an event, Typically the name of the show,
 * The venue it's being performed at and multiple instances of the performance model.
 *
 * Events can have many performances.
 */
class AbolSeatingWidget__Model_Event
{
    protected $name = null;

    protected $strapline = null;

    protected $venue = null;

    protected $bookingOpen = false;

    protected $performances;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }

    public function getStrapline()
    {
        return $this->strapline;
    }

    public function setStrapline($strapline)
    {
        $this->strapline = $strapline;
        return $this;
    }

    public function getVenue()
    {
        return $this->venue;
    }

    public function setVenue($venue)
    {
        $this->venue = $venue;
        return $this;
    }

    public function getBookingOpen()
    {
        return $this->bookingOpen;
    }

    public function setBookingOpen($bookingOpen)
    {
        $this->bookingOpen = $bookingOpen;
        return $this;
    }

   public function getPerformances()
   {
       return $this->performances;
   }

   public function setPerformances($performances)
   {
       $this->performances = $performances;
       return $this;
   }
}