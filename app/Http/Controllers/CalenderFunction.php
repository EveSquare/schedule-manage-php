<?php

use App\Models\Events;

function formatTemplate($events) { 
  $result = [];
  foreach($events as $event) {
    $item = [
      'title' => $event->title,
      'start' => date('Y-m-d\TH:i', strtotime($event->bigin_date)),
    ];
    array_push($result, $item);
  }
  return $result;
}