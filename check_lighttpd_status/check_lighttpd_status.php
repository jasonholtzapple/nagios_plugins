<?php
$ds_name[1] = 'Scoreboard';
$opt[1] = " --lower-limit 0 --title \"$hostname - Lighttpd Process Breakdown\" ";
$def[1] = rrd::def("closing", $RRDFILE[1], $DS[2], "AVERAGE");
$def[1] .= rrd::def("connecting", $RRDFILE[1], $DS[3], "AVERAGE");
$def[1] .= rrd::def("handling", $RRDFILE[1], $DS[4], "AVERAGE");
$def[1] .= rrd::def("harderror", $RRDFILE[1], $DS[5], "AVERAGE");
$def[1] .= rrd::def("keepalive", $RRDFILE[1], $DS[7], "AVERAGE");
$def[1] .= rrd::def("readpost", $RRDFILE[1], $DS[8], "AVERAGE");
$def[1] .= rrd::def("reading", $RRDFILE[1], $DS[9], "AVERAGE");
$def[1] .= rrd::def("requestend", $RRDFILE[1], $DS[10], "AVERAGE");
$def[1] .= rrd::def("requeststart", $RRDFILE[1], $DS[11], "AVERAGE");
$def[1] .= rrd::def("responseend", $RRDFILE[1], $DS[12], "AVERAGE");
$def[1] .= rrd::def("responsestart", $RRDFILE[1], $DS[13], "AVERAGE");
$def[1] .= rrd::def("waiting", $RRDFILE[1], $DS[17], "AVERAGE");
$def[1] .= rrd::def("writing", $RRDFILE[1], $DS[18], "AVERAGE");

$def[1] .= rrd::area("waiting", "#00cc00", rrd::cut("Waiting", 10), 1) ;
$def[1] .= rrd::gprint("waiting", "LAST", "%3.0lf");

$def[1] .= rrd::area("connecting", "#808000", rrd::cut("Connecting", 10), 1) ;
$def[1] .= rrd::gprint("connecting", "LAST", "%3.0lf");

$def[1] .= rrd::area("reading", "#408080", rrd::cut("Reading", 10), 1) ;
$def[1] .= rrd::gprint("reading", "LAST", '%3.0lf');

$def[1] .= rrd::area("readpost", "#003300", rrd::cut("Read-POST", 10), 1) ;
$def[1] .= rrd::gprint("readpost", "LAST", '%3.0lf\l');

$def[1] .= rrd::area("writing", "#33CCCC", rrd::cut("Writing", 10), 1) ;
$def[1] .= rrd::gprint("writing", "LAST", '%3.0lf');

$def[1] .= rrd::area("handling", "#339999", rrd::cut("Handle Req", 10), 1) ;
$def[1] .= rrd::gprint("handling", "LAST", '%3.0lf\l');

$def[1] .= rrd::area("requeststart", "#3399CC", rrd::cut("Req Start", 10), 1) ;
$def[1] .= rrd::gprint("requeststart", "LAST", '%3.0lf');

$def[1] .= rrd::area("requestend", "#3366CC", rrd::cut("Req End", 10), 1) ;
$def[1] .= rrd::gprint("requestend", "LAST", '%3.0lf\l');

$def[1] .= rrd::area("responsestart", "#9933CC", rrd::cut("Resp Start", 10), 1) ;
$def[1] .= rrd::gprint("responsestart", "LAST", '%3.0lf');

$def[1] .= rrd::area("responseend", "#6633CC", rrd::cut("Resp End", 10), 1) ;
$def[1] .= rrd::gprint("responseend", "LAST", '%3.0lf\l');

$def[1] .= rrd::area("keepalive", "#ff0066", rrd::cut("Keepalive", 10), 1) ;
$def[1] .= rrd::gprint("keepalive", "LAST", "%3.0lf");

$def[1] .= rrd::area("closing", "#ff0099", rrd::cut("Closing", 10), 1) ;
$def[1] .= rrd::gprint("closing", "LAST", "%3.0lf");

$def[1] .= rrd::area("harderror", "#ff00cc", rrd::cut("Hard Error", 10), 1) ;
$def[1] .= rrd::gprint("harderror", "LAST", '%3.0lf\n');

?>
