<div>
    <h1>Modify</h1>
    <form action="modProc" method="post">
        <input type="hidden" name="i_board" value="<?=$this->data->i_board?>">
        <div>Title : <input type="text" name="title" value="<?=$this->data->title?>"></div>
        <div>Content : <textarea name="ctnt"><?=$this->data->ctnt?></textarea></div>
        <div>
            <input type="submit" value="Modify">
        </div>
    </form>
</div>