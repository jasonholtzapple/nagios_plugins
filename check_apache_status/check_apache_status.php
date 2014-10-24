<?php
$ds_name[1] = 'Scoreboard';
$opt[1] = " --lower-limit 0 --title \"$hostname - Apache Process Breakdown\" ";
$def[1] = rrd::def("waiting", $RRDFILE[1], $DS[20], "AVERAGE");
$def[1] .= rrd::def("starting", $RRDFILE[1], $DS[16], "AVERAGE");
$def[1] .= rrd::def("reading", $RRDFILE[1], $DS[13], "AVERAGE");
$def[1] .= rrd::def("sending", $RRDFILE[1], $DS[15], "AVERAGE");
$def[1] .= rrd::def("keepalive", $RRDFILE[1], $DS[10], "AVERAGE");
$def[1] .= rrd::def("dns", $RRDFILE[1], $DS[6], "AVERAGE");
$def[1] .= rrd::def("closing", $RRDFILE[1], $DS[5], "AVERAGE");
$def[1] .= rrd::def("logging", $RRDFILE[1], $DS[11], "AVERAGE");
$def[1] .= rrd::def("finishing", $RRDFILE[1], $DS[7], "AVERAGE");
$def[1] .= rrd::def("cleanup", $RRDFILE[1], $DS[8], "AVERAGE");
$def[1] .= rrd::def("open", $RRDFILE[1], $DS[12], "AVERAGE");

$def[1] .= rrd::area("waiting", "#00cc00", rrd::cut("Waiting", 10), 1) ;
$def[1] .= rrd::gprint("waiting", "LAST", "%3.0lf");

$def[1] .= rrd::area("starting", "#808000", rrd::cut("Starting", 10), 1) ;
$def[1] .= rrd::gprint("starting", "LAST", "%3.0lf");

$def[1] .= rrd::area("reading", "#408080", rrd::cut("Reading", 10), 1) ;
$def[1] .= rrd::gprint("reading", "LAST", '%3.0lf\l');

$def[1] .= rrd::area("sending", "#3399cc", rrd::cut("Sending", 10), 1) ;
$def[1] .= rrd::gprint("sending", "LAST", "%3.0lf");

$def[1] .= rrd::area("keepalive", "#3366cc", rrd::cut("Keepalive", 10), 1) ;
$def[1] .= rrd::gprint("keepalive", "LAST", "%3.0lf");

$def[1] .= rrd::area("dns", "#0000ff", rrd::cut("DNS", 10), 1) ;
$def[1] .= rrd::gprint("dns", "LAST", '%3.0lf\l');

$def[1] .= rrd::area("closing", "#ff0033", rrd::cut("Closing", 10), 1) ;
$def[1] .= rrd::gprint("closing", "LAST", "%3.0lf");

$def[1] .= rrd::area("logging", "#ff0066", rrd::cut("Logging", 10), 1) ;
$def[1] .= rrd::gprint("logging", "LAST", "%3.0lf");

$def[1] .= rrd::area("finishing", "#ff0099", rrd::cut("Finishing", 10), 1) ;
$def[1] .= rrd::gprint("finishing", "LAST", "%3.0lf");

$def[1] .= rrd::area("cleanup", "#ff00cc", rrd::cut("Cleanup", 10), 1) ;
$def[1] .= rrd::gprint("cleanup", "LAST", '%3.0lf\n');

foreach ($this->DS as $KEY=>$VAL) {
    if ($VAL['WARN'] != "") {
        if ($VAL['NAME'] == "BusyWorkers") {
            $def[1] .= rrd::hrule($VAL['WARN'], "#ffff00", "Warning  on ".$VAL['WARN']." total workers\\n");
        }
    }
    if ($VAL['CRIT'] != "") {
        if ($VAL['NAME'] == "BusyWorkers") {
            $def[1] .= rrd::hrule($VAL['CRIT'], "#ff0000", "Critical on ".$VAL['CRIT']." total workers\\n");
        }
    }
}
?>
