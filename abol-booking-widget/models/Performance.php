<?php

/**
 * Performance data model.
 * Represents a single performance for an event.
 *
 * Performances belong to an event.
 */
class AbolSeatingWidget__Model_Performance
{
    protected $date;

    protected $availableSeats;

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    public function getAvailableSeats()
    {
        return $this->availableSeats;
    }

    public function setAvailableSeats($availableSeats)
    {
        $this->availableSeats = $availableSeats;
        return $this;
    }

    public function hydrate($data)
    {
        $this->setDate(new DateTime($data['bkpf_date']));
        $this->setAvailableSeats((int) $data['bkpf_avail']);

        return $this;
    }
}