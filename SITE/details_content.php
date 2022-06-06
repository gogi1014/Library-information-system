<div class ='tbl_title'> 
    <h3><?=$row['IME']; ?></h3>
</div>
            
<div class ='tbl_img'> 
    <img class="img-fluid img-thumbnail" width="50%";  src=<?=$row['url']; ?>>
</div>

<div class ='tbl_data'>
    <table table-hover table-dark table-striped>
        <tr>
            <td> Автор:</td> 
            <td> <?=$row['AUTHOR'] ?></td>
        </tr>
        <tr>
            <td> Тип на продукта:</td> 
            <td><?=$row['TYP'] ?></td>
        </tr>
        <tr>
            <td> Година на издаване:</td>
            <td> <?=$row['GOD']  ?></td>
            </tr>
        <tr>
            <td>Издателство:</td>
            <td><?=$row['IZD']  ?></td>
        </tr>
        <tr>
            <td> Брой страници:</td>
            <td> <?=$row['STR']  ?> </td>
        </tr>
        <tr>
            <td> Жанр:</td>
            <td> <?=$row['GENRE']  ?></td>
        </tr>
        <tr><td> Тагове:</td>
        <td><?=$row['TAG']  ?></td>
    </tr>
    </table>
</div>

