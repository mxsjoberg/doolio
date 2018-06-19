<?php

// starting session
session_start();

// destroying all sessions
if(session_destroy())
{
	// redirect to index
	header("location: home");
}

?>