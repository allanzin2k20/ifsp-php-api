<?php
class Session{
    public $id;
    public $name;
    public $token;
    public $client;

    function __construct($id, $idUser, $token, $client ) {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->token = $token;
        $this->client = $client;
    }

    public function create (){
            $conn = Database::connect();
            try{
                
                    $stmt = $conn->prepare("INSERT INTO sessions (id_user, token, client)
                    VALUES (:id_user, :token, :client)");
                    $stmt->bindParam(':id_user', $this->idUser);
                    $stmt->bindParam(':token', $this->token);
                    $stmt->bindParam(':client', $this->client);
                    $stmt->execute();
                    $id = $conn->lastInsertId();
                    $conn = null;
                    return $id;
            }catch(PDOException $e) {
                Database::dbError($e);
        }
    }

     function delete(){
                $conn = Database::connect();

                try{
                    $stmt = $conn->prepare("DELETE FROM sessions WHERE id_user = :id_user AND token = :token;");
                    $stmt->bindParam(':id_user', $this->idUser);
                    $stmt->bindParam(':token', $this->token);
                    $stmt->execute();
                    $rowsAffected = $stmt->rowCount();
                    $conn = null;
                    if ($rowsAffected > 0){
                        return true;
                } else {
                    return false;
                }
            }catch(PDOException $e) {
                Database::dbError($e);
            }
    }

}
?>