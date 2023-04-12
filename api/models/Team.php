<?php 

// Conexao com o banco de dados
require_once('config.php');

class Team {
    // Retorna todos os treinadores
    public static function getAll() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT team.*, coach.name as coach_name FROM team JOIN coach ON team.coach_id = coach.coach_id');
        $stmt->execute();

        // Retorna mensagem como JSON
        if ($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return ["message" => "Algo deu errado ao adicionar o coach!"];
        }
    }
  
    // Adiciona um novo treinador
    public static function addTeam($data) {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO team (coach_id, popular_name, nickname_club, name_club, acronym_club, shield_club) VALUES (:coach_id, :popular_name, :nickname_club, :name_club, :acronym_club, :shield_club)');
        $stmt->bindParam(':coach_id', $data['coach_id']);
        $stmt->bindParam(':popular_name', $data['popular_name']);
        $stmt->bindParam(':nickname_club', $data['nickname_club']);
        $stmt->bindParam(':name_club', $data['name_club']);
        $stmt->bindParam(':acronym_club', $data['acronym_club']);
        $stmt->bindParam(':shield_club', $data['shield_club']);

        // Retorna mensagem como JSON
        if ($stmt->execute()){
            return ["message" => "Team adicionado com sucesso!"];
        }else{
            return ["message" => "Algo deu errado ao adicionar o team!"];
        }
    }
  
    // Atualiza um treinador existente
    public static function updateTeam($data) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE team SET team_id = :team_id, coach_id = :coach_id, popular_name = :popular_name, nickname_club = :nickname_club, name_club = :name_club, acronym_club = :acronym_club, shield_club = :shield_club WHERE team_id = :team_id');
        $stmt->bindParam(':team_id', $data['team_id']);
        $stmt->bindParam(':coach_id', $data['coach_id']);
        $stmt->bindParam(':popular_name', $data['popular_name']);
        $stmt->bindParam(':nickname_club', $data['nickname_club']);
        $stmt->bindParam(':name_club', $data['name_club']);
        $stmt->bindParam(':acronym_club', $data['acronym_club']);
        $stmt->bindParam(':shield_club', $data['shield_club']);

        // Retorna mensagem como JSON
        if ($stmt->execute()){
            return ["message" => "Team atualizado com sucesso!"];
        }else{
            return ["message" => "Algo deu errado ao atualizar o team!"];
        }
    }

    public static function deleteTeam($data) {
        global $dbh;
        $stmt = $dbh->prepare('DELETE FROM team WHERE team_id = :team_id');
        $stmt->bindParam(':team_id', $data['team_id']);

        // Retorna mensagem como JSON
        if ($stmt->execute()){
            return ["message" => "Team deletado com sucesso!"];
        }else{
            return ["message" => "Algo deu errado ao deletar o team!"];
        }
    }
}  

?>