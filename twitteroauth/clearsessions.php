<?php

/**
 * @file
 * Clears PHP sessions and redirects to the connect page.
 */
/* Load and clear sessions */
session_start();

unset($_SESSION['access_token']['oauth_token']);
unset($_SESSION['access_token']['oauth_token_secret']);
unset($_SESSION['access_token']);
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);
unset($_SESSION['oauth_status']);
unset($_SESSION['status']);


/* Redirect to page with the connect to Twitter option. */
//header('Location: ./connect.php');
header('Location: ./redirect.php');
