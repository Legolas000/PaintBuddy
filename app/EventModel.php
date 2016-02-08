<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MaddHatter\LaravelFullcalendar\Event;

class EventModel extends Model implements Event
{

    //
    protected $dates = ['start', 'end'];

    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Get the color for event
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
<<<<<<< HEAD

    /**
     * Get the color for event
     *
     * @return string
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * Get the descriptition for the event
     *
     * @return string
     */
    public function getDescrip()
    {
        return $this->description;
    }
=======
>>>>>>> origin/master
}
