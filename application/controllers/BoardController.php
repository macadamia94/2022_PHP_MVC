<?php
namespace application\controllers;

use application\models\BoardModel;

class BoardController extends Controller {
    public function list() {
        $model = new BoardModel();
        $this->addAttribute(_TITLE, "LIST");
        $this->addAttribute("list", $model->selBoardList());
        $this->addAttribute(_JS, ["board/list"]);
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/list.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
        return "template/t1.php";
    }
}