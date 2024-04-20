<html>
<div>
<img src='Images/Logo-nbg.png' width='170' height='40'/> 
<br>
</div>


<style type="text/css">

    table{
        width: 150px;
        background:#f5fffa;
        padding:20px;
        font-size:13px;
        font-family:tahoma;
        border-spacing:22;
    }

    th{
        background-color:#f5fffa;
        padding:4px;
        width:100px;
    }

    td{
        padding:4px;
        border-bottom: solid thin #ddd;
    }
   
    .table-striped tbody tr:first-child td {
  background-color: #FF0000;
}
    </style>

<?php
require_once("viewReports.php");
require_once("connection.php");

view_Reports($connection);
?>