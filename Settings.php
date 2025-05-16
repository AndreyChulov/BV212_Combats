<?php

global $ROOT_URL;
global $SESSION_TIMEOUT;

$ROOT_URL = $_ENV["BV212_COMBATS_SITE"] ?? "https://localhost";
$SESSION_TIMEOUT = 2*60;//2 minutes
