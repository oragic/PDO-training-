<?php
 require_once '../connection.php';
class deleteMethod
{
    private $con;
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";

        $this->con = Connection::getConn();
        $startment =  $this->con->prepare($sql);
        $startment->bindValue(":id",$id);
        $startment->execute();

        echo "<hi> DATA HAS BEEN DELETE</h1>";
    }
}