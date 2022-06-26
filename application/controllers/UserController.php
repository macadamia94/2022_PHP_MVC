<?php
namespace application\controllers;
use application\models\UserModel;

class UserController extends Controller {
    public function join() {
        $this->addAttribute(_TITLE, "JOIN");
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("user/join.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
        return "template/t1.php";
    }

    public function joinProc() {
        $param = [
            "uid" => $_POST["uid"],
            "upw" => $_POST["upw"],
            "nm" => $_POST["nm"],
            "gender" => $_POST["gender"]
        ];

        $param["upw"] = password_hash($param["upw"], PASSWORD_BCRYPT);
        $model = new UserModel;
        $model->insUser($param);
        return "redirect:join";
    }

    public function login() {
        
    }
}