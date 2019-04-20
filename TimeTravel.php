<?php
namespace Time;

use \DateTime;
use \DateInterval;
use \DatePeriod;

class TimeTravel
{
    private $start;
    private $end;

    /**
     * TimeTravel constructor.
     * @param DateTime $start
     * @param DateTime $end
     */
    public function __construct(DateTime $start, DateTime $end)
    {
        $this->setStart($start);
        $this->setEnd($end);
    }

    /**
     * @return mixed
     */
    public function getStart():DateTime
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd():DateTime
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getTravelInfo() : string
    {
        $interv= $this->getStart()->diff($this->getEnd(),true);
        $result = "Il y a $interv->y années, $interv->m mois, $interv->d jours, $interv->h heures, $interv->m minutes et $interv->s secondes entre les deux dates";

        return $result;
    }

    /**
     * @param DateInterval $interval
     * @return DateTime
     */
    public function findDate(DateInterval $interval) : DateTime
    {
        return $this->getStart()->sub($interval);
    }

    public function backToFutureStepByStep(DateInterval $step) : array
    {
        $period = new DatePeriod($this->getStart(), $step, $this->getEnd());
        $dates = [];
        foreach ($period as $date) {
            $dates[]= $date->format('M d Y A h:i');
        }

        return $dates;
    }
}