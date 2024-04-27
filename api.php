<?php
    include("./sql.php");
    switch($_GET["do"]){
        case "getData":
            $data = $pdo->query("select * from users")->fetchAll();
            echo json_encode($data);

            //底下為return api的範例
            // $result = [
            //     "name"=>"first data",
            //     "data"=>$data,
            // ];
            // header('content-type:application/json');
            // echo json_encode($result,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;
        case "add":
            // print_r($_POST);
            $data = $pdo->query("select * from users where username = '{$_POST['username']}' ")->fetch();
            if(empty($data)){
                $pdo->query("insert into users values('','{$_POST['account']}','{$_POST['username']}','{$_POST['password']}')");
                echo "good";
            }
            break;
        case "del":
            $pdo->query("delete from users where id ='{$_POST['id']}'");
            echo "good";
            break;
        case "edit":
            $pdo->query("update users set username='{$_POST['username']}',account='{$_POST['account']}',password='{$_POST['password']}' where id ='{$_POST['id']}'");
            echo "good";
            break;
    }