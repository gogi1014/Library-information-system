<?php

require_once('./modules/template.php');

// zadavame pytia do firektoriata sys HTML shabloni
$path = './templates/';

// syazdawame instakcia na klasa
$tpl = new Template($path);


   
    while($row = $result->fetch_assoc()){
        
        $tpl->set('id', $row["id"]);
        $tpl->set('IME', $row["IME"]);
        $tpl->set('AUTHOR', $row["AUTHOR"]);
        $tpl->set('TYP', $row["TYP"]);
        $tpl->set('GOD', $row["GOD"]);
        $tpl->set('IZD', $row["IZD"]);
        $tpl->set('STR', $row["STR"]);
        $tpl->set('GENRE', $row["GENRE"]);
        $tpl->set('TAG', $row["TAG"]);
        $tpl->set('url', $row["url"]);
        

        
        print $tpl->fetch('_index_table.html');

        
       }
        ?>