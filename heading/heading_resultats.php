<?php

echo <<<HEADING
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="DataTables-1.10.5/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/tabletools/2.2.3/css/dataTables.tableTools.css">
<link rel="stylesheet" type="text/css" href="Editor/css/dataTables.editor.css">

<!-- DataTables -->
<script type="text/javascript" language="javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" charset="utf8" src="DataTables-1.10.5/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/tabletools/2.2.3/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" charset="utf-8" src="Editor/js/dataTables.editor.min.js"></script>

HEADING;


//JQUERY
echo '<script type="text/javascript" charset="utf-8" src="js/js_resultats.js"></script>'.PHP_EOL;
echo '<script type="text/javascript" charset="utf-8" src="https://code.jquery.com/jquery-1.11.2.js"></script>';


?>