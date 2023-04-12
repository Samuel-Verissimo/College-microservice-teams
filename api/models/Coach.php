<?php 

// Conexao com o banco de dados
require_once('config.php');

class Coach {
    // Retorna todos os treinadores
    public static function getAll() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM coach');
        $stmt->execute();

        // Retorna mensagem como JSON
        if ($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return ["message" => "Algo deu errado ao adicionar o coach!"];
        }
    }
  
    // Adiciona um novo treinador
    public static function addCoach($data) {
    
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO coach (name, age) VALUES (:name, :age)');
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':age', $data['age']);

        // Retorna mensagem como JSON
        if ($stmt->execute()){
            return ["message" => "Coach adicionado com sucesso!"];
        }else{
            return ["message" => "Algo deu errado ao adicionar o coach!"];
        }
    }
  
    // Atualiza um treinador existente
    public static function updateCoach($data) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE coach SET name = :name, age = :age WHERE coach_id = :id');
        $stmt->bindParam(':id', $data['coach_id']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->execute();

        // Retorna mensagem como JSON
        if ($stmt->execute()){
            return ["message" => "Coach atualizado com sucesso!"];
        }else{
            return ["message" => "Algo deu errado ao atualizar o coach!"];
        }
    }

    public static function deleteCoach($data) {
        global $dbh;
        $stmt = $dbh->prepare('DELETE FROM coach WHERE coach_id = :id');
        $stmt->bindParam(':id', $data['coach_id']);
        $stmt->execute();

        // Retorna mensagem como JSON
        if ($stmt->execute()){
            return ["message" => "Coach deletado com sucesso!"];
        }else{
            return ["message" => "Algo deu errado ao deletar o coach!"];
        }
    }
}  

?>