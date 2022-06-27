<?php
namespace application\controllers;

include_once "application/utils/SessionUtils.php";

abstract class Controller {
    public function __construct($action) { // 생성자함수 action
        $view = $this->$action();
        require_once $this->getView($view); // require_once : 클래스로 만들어 놓은 파일을 읽어서 사용
    }
    
    protected function addAttribute($key, $val) {
        $this->$key = $val;
    }

    protected function getView($view) {
        if(strpos($view, "redirect:") === 0) {
            header("Location: " . substr($view, 9));
            return;
        }
        return _VIEW . $view;
    }
}