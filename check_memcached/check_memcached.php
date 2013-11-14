<?php
$orange    = '#FF9933';
$blue      = '#3E9ADE';
$red       = '#FF3300';
$darkred   = '#990000';
$paleblue  = '#80B4C1';
$yellow    = '#FFCC00';

$ds_name[1] = 'Cache Hit Percentage';
$opt[1] = '--title "Cache Hit Percentage" --vertical-label % --lower-limit 0 --upper-limit 101 --rigid';
$def[1] = rrd::def('get_hits', $RRDFILE[1], $DS[2], 'AVERAGE');
$def[1] .= rrd::def('get_misses', $RRDFILE[1], $DS[3], 'AVERAGE');
$def[1] .= rrd::cdef('cache_hit_pc','100,get_misses,get_hits,/,100,*,-');
$def[1] .= rrd::gradient('cache_hit_pc','#BDC6DE','#3152A5');
$def[1] .= rrd::gprint('cache_hit_pc', array("LAST", "AVERAGE", "MAX"), "%.2lf %s");

$ds_name[2] = 'Cache Hit Rate';
$opt[2] = '--title "Activity" --vertical-label "Hits Per Second"';
$def[2] = rrd::def('get_hits', $RRDFILE[1], $DS[2], 'AVERAGE');
$def[2] .= rrd::gradient('get_hits','#BDC6DE','#3152A5');
$def[2] .= rrd::gprint('get_hits', array("LAST", "AVERAGE", "MAX"), "%.2lf %s");

$ds_name[3] = 'bytes';
$opt[3] = '--title "Cache Size" --vertical-label "bytes"';
$def[3] = rrd::def('bytes', $RRDFILE[1], $DS[5], 'MAX');
$def[3] .= rrd::gradient('bytes','#BDC6DE','#3152A5');
$def[3] .= rrd::gprint('bytes', array("LAST", "AVERAGE", "MAX"), "%.0lf %s");

$ds_name[4] = 'curr_connections';
$opt[4] = '--title "Connections" --vertical-label "connections"';
$def[4] = rrd::def('curr_connections', $RRDFILE[1], $DS[1], 'AVERAGE');
$def[4] .= rrd::gradient('curr_connections','#BDC6DE','#3152A5');
$def[4] .= rrd::gprint('curr_connections', array("LAST", "AVERAGE", "MAX"), "%.0lf %s");

$ds_name[5] = 'evictions';
$opt[5] = '--title "Cache Evictions" --vertical-label "evictions"';
$def[5] = rrd::def('evictions', $RRDFILE[1], $DS[6], 'MAX');
$def[5] .= rrd::gradient('evictions','#BDC6DE','#3152A5');
$def[5] .= rrd::gprint('evictions', array("LAST", "AVERAGE", "MAX"), "%.0lf %s");

$ds_name[6] = 'listen_disabled_num';
$opt[6] = '--title "Listener Disabled Events" --vertical-label "events"';
$def[6] = rrd::def('listen_disabled_num', $RRDFILE[1], $DS[4], 'MAX');
$def[6] .= rrd::gradient('listen_disabled_num','#BDC6DE','#3152A5');
$def[6] .= rrd::gprint('listen_disabled_num', array("LAST", "AVERAGE", "MAX"), "%.0lf %s");
?>
