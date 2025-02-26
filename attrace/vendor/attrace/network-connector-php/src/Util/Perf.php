<?php


namespace Attrace\Connector\Util;


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Exceptions\AttraceException;

class Perf
{
    private static $register = [];

    private static $log = [];

    private static $enabled = 'no_init';

    private static $base = 0;

    private static function isEnabled()
    {
        if (self::$enabled == 'no_init') {
            try {
                self::$enabled = Util::isProfiling();
            } catch (AttraceException $e) {
                //no storage configured exception
                self::$enabled = true;
            }
        }
        return self::$enabled;
    }

    public static function start($key, $label = null)
    {
        if (!self::isEnabled()) {
            return;
        }
        self::initBase();
        $start                = microtime(true);
        $start_ms             = Util::getCurrentTimeMs() - self::$base;
        self::$register[$key] = [
            'label'    => $label ? $label : $key,
            'start'    => $start,
            'start_ms' => $start_ms,
        ];
    }

    public static function stop($key)
    {
        if (!self::isEnabled()) {
            return;
        }
        self::$register[$key]['stop']    = microtime(true);
        self::$register[$key]['stop_ms'] = Util::getCurrentTimeMs() - self::$base;
        self::$register[$key]['time']    = self::$register[$key]['stop'] - self::$register[$key]['start'];

    }

    public static function results()
    {
        return self::$register;
    }

    public static function getTimelineHeader()
    {
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['timeline']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var container = document.getElementById('timeline');
                var chart = new google.visualization.Timeline(container);
                var dataTable = new google.visualization.DataTable();

                dataTable.addColumn({type: 'string', id: 'Function'});
                dataTable.addColumn({type: 'string', id: 'Name'});
                dataTable.addColumn({type: 'date', id: 'Start'});
                dataTable.addColumn({type: 'date', id: 'End'});
                dataTable.addRows([
                    <?php
                    foreach (self::$register as $key => $performance) {
                    ?>

                    ['<?php echo $performance['label']; ?>', '<?php echo $performance['label']; ?>', new Date(<?php echo $performance['start_ms']; ?>), new Date(<?php echo $performance['stop_ms']; ?>)],
                    <?php
                    }
                    ?>
                ]);
                var options = {
                    timeline: {showRowLabels: false}
                };
                chart.draw(dataTable, options);
            }
        </script>
        <?php
    }

    public static function getTimelineDiv()
    {
        echo '<div id="timeline" style="height: 800px;"></div>';
    }

    public static function log($string)
    {
        if (!self::isEnabled()) {
            return;
        }
        self::initBase();
        self::$log[] = [
            'ts'  => Util::getCurrentTimeMs() - self::$base,
            'log' => $string
        ];
    }

    public static function returnLogs()
    {
        return self::$log;
    }

    public static function initBase()
    {
        if (self::$base == 0) {
            self::$base = Util::getCurrentTimeMs();
        }
    }
}