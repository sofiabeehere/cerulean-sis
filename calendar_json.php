<?php

require('templates/db_login_connect.php');

// Instead of the initial plan of using Google Calendar API to populate and store school events, the following uses and reads a database of events, encodes them as a json requst, which is then parsed by the 'fullcalendar.js' from the FullCalendar library.
// Cite: http://stackoverflow.com/questions/22592408/how-to-show-info-from-database-in-fullcalendar

$read_events = "SELECT * FROM school_calendar";

$res = mysqli_query($cntn, $read_events);
$events = array();

while ($row = mysqli_fetch_assoc($res)) {

	$eventsArray['id'] =  $row['event_id'];
	$eventsArray['title'] = $row['event_title'];
	$eventsArray['start'] = $row['start_date'];
	$eventsArray['end'] = $row['end_date'];
	$events[] = $eventsArray;

}

echo json_encode($events);

?>