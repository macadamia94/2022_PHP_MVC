<?php
    spl_autoload_register(function ($path) {
        $path = str_replace('\\','/',$path);    // str_replace : 문자열치환 ('변경대상', '변경문자', 변수(바꾸고자 하는 문자열))
        $paths = explode('/', $path);   // explode : 문자열 분할하여 배열로 저장 ('분할기준', 분할할 문자열)
        if (preg_match('/model/', strtolower($paths[1]))) {
            $className = 'models';
        } else if (preg_match('/controller/',strtolower($paths[1]))) {
            $className = 'controllers';
        } else {
            $className = 'libs';
        }

        $loadpath = $paths[0].'/'.$className.'/'.$paths[2].'.php';
        
       // echo 'autoload $path : ' . $loadpath . '<br>';
        
        if (!file_exists($loadpath)) {  // file_exists : 파일 존재 유무
            echo " --- autoload : file not found. ($loadpath) ";
            exit();
        }
        require_once $loadpath; 
    });

    /* 
        model과 controller만 클래스 $className 변수에 저장
        Model과 Controller는 모두 클래스로 만들어져 있지만 
        View는 화면에 데이터를 출력하기 위해 class 가 아니라 
        html 코드를 품은 일반적인 php 파일 이기 때문

        모든 클래스 파일이 application 아래 있는 각 기능별 디렉토리 안에 위치가게 됨
        호출을 하기 위해서는 아래 형식을 따르게 됨
        new \application\(model or controller)\method명();
        
        '\' 문자를 기준으로 경로를 구분
        두번째 값에 따라  Model의 객체 인지 Controller의 객체 인지를 구분 할 수 있게 됨
        해당 경로에 해당하는 컨트롤러가 있으면 해당 파일을 require_once로 불러 오게함
    */
