<?php    
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
    
    echo "<h1>PHP QR Code</h1><hr/>";
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
 $filename = $PNG_TEMP_DIR.'QR.png';
$errorCorrectionLevel = 'L';
$matrixPointSize = 20;
$Text = "kornthong-12345";
echo $Text;

    

       
        $filename = $PNG_TEMP_DIR.'QR'.md5($Text.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($Text, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
//$pic = "temp/".'QR'.md5($Text.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
//
echo "<img src='".$pic."' width='30%'>";

    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
    
  ?>