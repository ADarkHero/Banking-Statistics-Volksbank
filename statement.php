<?php

require_once ('inc/template.php');


/* * ******************
  Shows a menu to switch pages
 * ****************** */
require_once ('inc/statement/pageFunctions.php');
getPagedisplay($conn, true, $page, $pageback, $pageforward);




/* * ******************
  List all transactions
  Tag transactions.
 * ****************** */
require_once('inc/statement/listTransactions.php');

getPagedisplay($conn, false, $page, $pageback, $pageforward);


require_once ('inc/template_end.php');
