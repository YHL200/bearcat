<?php
class Model {
    //存放pdo的成员属性
    private $pdo;

    //构造方法的作用就是获取Db中的pdo
    public function __construct()
    {
        include_once 'Db.class.php';
        $db = Db::getIns();
        $this->pdo = $db->pdo;
    }

    //查询一行
    public function find($sql, $params=array()){
        try{
            $stmt = $this->pdo->prepare($sql);
            //给占位符绑定值
            if($params){
                $this->bindValue($params, $stmt);
            }
            //执行，并返回值
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return false;
        }catch (PDOException $e){
            echo '错误描述：' . $e->getMessage() . '<br>';
            echo '出错位置：' . $e->getFile() . '中的第' . $e->getLine() . '行';
            exit();
        }
    }
    //查询所有行
    public function select($sql, $params=array()){
        try{
            $stmt = $this->pdo->prepare($sql);
            //给占位符绑定值
            if($params){
                $this->bindValue($params, $stmt);
            }
            //执行，并返回值
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return false;
        }catch (PDOException $e){
            echo '错误描述：' . $e->getMessage() . '<br>';
            echo '出错位置：' . $e->getFile() . '中的第' . $e->getLine() . '行';
            exit();
        }
    }
    //查询总记录数  select count(*) form table where ...;
    public function count($sql, $params=array()){
        try{
            $stmt = $this->pdo->prepare($sql);
            //给占位符绑定值
            if($params){
                $this->bindValue($params, $stmt);
            }
            //执行，并返回值
            if($stmt->execute()){
                return $stmt->fetchColumn();
            }
            return false;
        }catch (PDOException $e){
            echo '错误描述：' . $e->getMessage() . '<br>';
            echo '出错位置：' . $e->getFile() . '中的第' . $e->getLine() . '行';
            exit();
        }
    }
    //查询一行一列（可以略）
    //添加方法
    public function add($sql, $params=array()){
        try{
            $stmt = $this->pdo->prepare($sql);
            //给占位符绑定值
            if($params){
                $this->bindValue($params, $stmt);
            }
            //执行，并返回值
            if($stmt->execute()){
                return $this->pdo->lastInsertId();
            }
            return false;
        }catch (PDOException $e){
            echo '错误描述：' . $e->getMessage() . '<br>';
            echo '出错位置：' . $e->getFile() . '中的第' . $e->getLine() . '行';
            exit();
        }
    }

    //修改方法
    public function save($sql, $params=array()){
        try{
            $stmt = $this->pdo->prepare($sql);
            //给占位符绑定值
            if($params){
                $this->bindValue($params, $stmt);
            }
            //执行，并返回值
            if($stmt->execute()){
                return $stmt->rowCount();
            }
            return false;
        }catch (PDOException $e){
            echo '错误描述：' . $e->getMessage() . '<br>';
            echo '出错位置：' . $e->getFile() . '中的第' . $e->getLine() . '行';
            exit();
        }
    }
    //删除方法
    public function delete($sql, $params=array()){
        try{
            $stmt = $this->pdo->prepare($sql);
            //给占位符绑定值
            if($params){
                $this->bindValue($params, $stmt);
            }
            //执行，并返回值
            if($stmt->execute()){
                return $stmt->rowCount();
            }
            return false;
        }catch (PDOException $e){
            echo '错误描述：' . $e->getMessage() . '<br>';
            echo '出错位置：' . $e->getFile() . '中的第' . $e->getLine() . '行';
            exit();
        }
    }

    //提取给SQL中的占位符绑定值的代码
    private function bindValue($params, $stmt){
        foreach($params as $key=>$value){
            if(is_int($key)){
                $stmt->bindValue($key+1, $value);
            }else{
                //可以使用 desc student;
                $stmt->bindValue(":".$key, $value); //$key = n,s,
            }
        }
    }
}
?>