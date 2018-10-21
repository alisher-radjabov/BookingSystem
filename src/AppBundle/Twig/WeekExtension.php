<?php
// Custom twig extension for converting integer to day of week
namespace AppBundle\Twig;

class WeekExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('dow', array($this, 'dowFilter')),
        );
    }

    public function dowFilter($number)
    {
        $dow = jddayofweek($number-1, 1);

        return $dow;
    }
}