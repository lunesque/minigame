<?php
class Character {
    //properties
    private $id;
    private $name;
    private $maxHP;
    private $currentHP;
    private $atk;
    private $def;
    private $avatar;
    private static $counter;

    //setters
    public function setId($x) {
        $this->id = $x;
    }
    public function setName($x) {
        $this->name = $x;
    }
    public function setMaxHP($x) {
        $this->maxHP = $x;
        if ($x<0) { 
            $this->maxHP = 0;
        }
    }
    public function setcurrentHP($x) {
        $this->currentHP = $x;
        if ($x<0) { 
            $this->currentHP = $x;
        }
    }
    public function setAtk($x) {
        $this->atk = $x;
    }
    public function setDef($x) {
        $this->def = $x;
    }
    public function setAvatar($file) {
        $this->avatar = $file;
    }


    //getters
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getMaxHP() {
        return $this->maxHP;
    }
    public function getAtk() {
        return $this->atk;
    }
    public function getDef() {
        return $this->def;
    }
    public static function getCounter() {
        return self::$counter;
    }
    public function getCurrentHP() {
        return $this->currentHP;
    }
    public function getAvatar() {
        return $this->avatar;
    }


    //hydrate
    private function hydrate(array $data){
        foreach ($data as $key => $value) {
        $method = 'set'.ucfirst($key);      
        if (method_exists($this, $method))   {
            $this->$method($value);
            }
        }
    }
    
    public function __construct(array $data) {
    $this->hydrate($data);
    self::$counter++;
    }

    public function is_dead() {
        return $this->currentHP<=0;
    }

    public function regenerate($x = null) {
        if (is_null($x)) {
            $this->currentHP = $this->maxHP;
        } else {
            if (($this->currentHP + $x)<=$this->maxHP) {
                $this->currentHP += $x;
            } else $this->currentHP = $this->maxHP;

        }
    }

    public function attack(Character $defender) {
        $dmg = round(($this->atk)/($defender->def/100),0);
        if ($defender->currentHP - $dmg > 0) {
            $defender->currentHP = $defender->currentHP -= $dmg;
        } else $defender->currentHP = 0;
        return $dmg;
    }

}
?>