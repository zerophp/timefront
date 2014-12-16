<?php
switch ($request['action'])
{
    case 'insert':
        include('../modules/Application/src/Application/views/timeline/insert.phtml');
    break;
    case 'update':
        include('../modules/Application/src/Application/views/timeline/update.phtml');
    break;
    default:
    case 'select':
        include('../modules/Application/src/Application/views/timeline/select.phtml');
    break;
    case 'delete':
        include('../modules/Application/src/Application/views/timeline/delete.phtml');     
    break;
}