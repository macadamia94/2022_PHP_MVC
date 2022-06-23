<?php
namespace application\models;
use PDO;

class BoardModel extends Model {
    public function selBoardList(){
        $sql = "SELECT i_board, title, created_at
                  FROM t_board
                 ORDER BY i_board DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function selBoard(&$param) {
        $sql = "SELECT B.*
                     , U.i_user, U.nm
                  FROM t_board B
                 INNER JOIN t_user U
                    ON B.i_user = U.i_user
                 WHERE i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delBoard(&$param) {
        $sql = "DELETE FROM t_board
                 WHERE i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        return $stmt->execute();
    }

    public function updBoard(&$param) {
        $sql = "UPDATE t_board
                   SET title = :title
                     , ctnt = :ctnt
                 WHERE i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->bindValue(':title', $param["title"]);
        $stmt->bindValue(':ctnt', $param["ctnt"]);
        $stmt->execute();
    }
}