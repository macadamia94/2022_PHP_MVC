<!DOCTYPE html>
<html lang="en">

<body>
    <div>
        <button id="btnDel" data-i_board="<?=$this->data->i_board?>">delete</button>
        <a href="mod?i_board=<?$this->data->i_board?>"><button>modify</button></a>
    </div>
    <table id="container">
        <tr>
            <td colspan="4" class="writer"><h2>Details | <?=$this->data->nm?></h2></td>
        </tr>        
        <tr>
            <td colspan="4" class="title"><?=$this->data->title?></td>
        </tr>
        <tr>
            <th class="read">Num</th>
            <td class="read2"><?=$this->data->i_board?></td>
            <th class="read">Created At</th>
            <td class="read2"><?=$this->data->created_at?></td>
        </tr>
        <tr>
            <td colspan="4" class="ctnt"><?=$this->data->ctnt?></td>
        </tr>
    </table>
</body>
</html>