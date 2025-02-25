<?php
class CharacterManager {

    private $db;
    
    public function __construct($x){
        $this->db = $x;    
    }
    
    public function getAllCharacters() :array
    {
        $requete="select * FROM characters";
        $stmt = $this->db->query($requete);
        while ($chara = $stmt->fetch(PDO::FETCH_ASSOC)){
            $characters[] = new Character($chara);
            }
        return $characters;
    }
    
    
    public function getOneCharacterById ($id) :Character
    {
        $requete="select * FROM characters WHERE id = :id";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $chara = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Character($chara);
    }

    public function addCharacter(Character $chara) :bool
    {
        $requete="insert into characters(id, name, maxHP, atk, def, avatar) values(null, :name, :maxHP, :atk, :def, :avatar)";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':name', $chara->getName());
        $stmt->bindValue(':maxHP', $chara->getMaxHP());
        $stmt->bindValue(':atk', $chara->getAtk());
        $stmt->bindValue(':def', $chara->getDef());
        $stmt->bindValue(':avatar', $chara->getAvatar());
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteCharacter($id) :bool {
        $requete="delete from characters where id = :id";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    
    public function modifyCharacter($id, $array) :bool 
    {
        $requete="update characters set name = :name, maxHP = :maxHP, atk = :atk, def = :def, avatar = :avatar where id = :id";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $array['name']);
        $stmt->bindValue(':maxHP', $array['maxHP']);
        $stmt->bindValue(':atk', $array['atk']);
        $stmt->bindValue(':def', $array['def']);
        $stmt->bindValue(':avatar', $array['avatar']);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    
}


    

?>