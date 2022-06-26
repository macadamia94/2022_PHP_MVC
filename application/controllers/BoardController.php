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

    public function detail() {
        $model = new BoardModel();
        $i_board = $_GET["i_board"];
        $param = ["i_board" => $i_board];
        $this->addAttribute(_TITLE, "Detail");
        $this->addAttribute("data", $model->selBoard($param));
        $this->addAttribute(_JS, ["board/detail"]);
        $this->addAttribute(_CSS, ["board/detail"]);
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/detail.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
        return "template/t1.php";
        // return "board/detail.php";
    }

    public function del() {
        $model = new BoardModel();
        $i_board = $_GET["i_board"];
        $param = ["i_board" => $i_board];
        $model->delBoard($param);
        return "redirect:list";
    }

    public function mod() {
        $model = new BoardModel();
        $i_board = $_GET["i_board"];
        $param = ["i_board" => $i_board];
        $this->addAttribute("data", $model->selBoard($param));
        $this->addAttribute(_TITLE, "Modify");
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/mod.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
        return "template/t1.php";
    }

    public function modProc() {
        $model = new BoardModel();
        $i_board = $_POST["i_board"];
        $title = $_POST["title"];
        $ctnt = $_POST["ctnt"];
        $param = [
            "i_board" => $i_board,
            "title" => $title,
            "ctnt" => $ctnt
        ];
        $model->updBoard($param);
        return "redirect:/board/detail?i_board={$i_board}";
    }

    public function write() {
        $this->addAttribute(_TITLE, "Write");
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/write.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
        return "template/t1.php";
    }

    public function writeProc() {
        $model = new BoardModel();
        // $i_user = $_SESSION[_LOGINUSER]->i_user;
        $title = $_POST["title"];
        $ctnt = $_POST["ctnt"];
        $param = [
            // "i_user" => $i_user,
            "title" => $title,
            "ctnt" => $ctnt
        ];
        $model->insBoard($param);
        return "redirect:/board/list";
    }
}