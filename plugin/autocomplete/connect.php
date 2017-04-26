<?php
mysql_connect("localhost", "root", "tech2008") or die ("error connection!!!");
mysql_select_db("eoffice") or die("error db!!!");
mysql_query("SET NAMES UTF8");