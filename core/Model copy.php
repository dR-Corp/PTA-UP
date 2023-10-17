<?php
/**
 * 
 * class Structure
 */
class Model_copy {

    
    protected $connection;
    
    protected $table;
    
    protected $id;

    protected $attributes = [];

    protected $fillable = [];


    private static function getSnakeCaseName($className) {
        $className = preg_replace('/([a-z])([A-Z])/', '$1_$2', $className."s"); // Convertir CamelCase en snake_case
        $className = strtolower($className); // Convertir en minuscules
        return $className;
    }
    
    protected function fillableFromArray(array $attributes) {
        if (count($this->fillable) > 0) {
            return array_intersect_key($attributes, array_flip($this->fillable));
        }
        return $attributes;
    }

    public function fill(array $attributes = []) {
        $attributes = $this->fillableFromArray($attributes);
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
            // $this->setAttributes($key, $value);
        }
        return $this;
    }

    public function __call($method, $args)  {
        if (strpos($method, 'get') === 0) {
            $property = lcfirst(substr($method, 3));
            return $this->attributes[$property] ?? null;
        } elseif (strpos($method, 'set') === 0) {
            $property = lcfirst(substr($method, 3));
            // $this->attributes[$property] = $args[1] ?? null;
            $this->attributes[$property] = $args[0] ?? null; // j'ai changé le 1 en 0 lors d'un debuggage à la construction ed la function hydrade (semblable à fill)
        }
    }

    /**
     * Constructeur de la classe qui assigne les données spécifiées en paramètre aux attributs correspondants.
     * @param $valeurs array Les valeurs à assigner
     * @return void
     */
    public function __construct(array $valeurs = [])
    {
        if (!empty($valeurs)) {
            $this->hydrate($valeurs);
        }
        $callingClass = get_called_class();
        $this->table = self::getSnakeCaseName($callingClass);
        $this->connection = new DB($this->table);
    }

    // ID GETTES AND SETTER
    public function id() {
        return $this->id;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        if(empty($id) || !is_int($id) || is_null($id)) {
            throw new InvalidArgumentException("L'identifient doit être un nombre entier non null", 1);
        }
        $this->id = $id;
    }
    
    /**
     * Méthode assignant les valeurs spécifiées aux attributs correspondant.
     * @param $donnees array Les données à assigner
     * @return void
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            $methode = 'set' . ucfirst($attribut);
            if (is_callable(array($this, $methode))) {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * Méthode permettant de savoir si l'élément du modèle est nouveau ou non.
     * @return bool
     */
    public function isNew() {
        return empty($this->getId());
    }

    /**
     * Create a new instance
     * @param array attributes 
     * @return $intance
     */
    public static function create(array $attributes = []) {
        
        $callingClass = get_called_class();
        $tableName = self::getSnakeCaseName($callingClass);

        $instance = new $callingClass;
        $instance->fill($attributes);

        $db = new DB("$tableName");
        if($db->create($instance->attributes))
            return $instance;
        else
            return null;
    }

    /**
     * Update a specific instance
     * @param array attributes
     * @return $intance
     */
    public function update(array $attributes = []) {

        $id = $this->id() ?? null; // oh plutôt un get id

        if ($id !== null) {
            $attributes = $this->fillableFromArray($attributes);
            $this->fill($attributes);

            $callingClass = get_called_class();
            $tableName = self::getSnakeCaseName($callingClass);

            $db = new DB($tableName);
            return $db->update($id, $this->attributes);
        }
        else {
            throw new Exception("Cet élément doit exister afin d'être modifié", 1);            
            return false;
        }

    }

    public static function find($id) {
        $callingClass = get_called_class();
        $tableName = self::getSnakeCaseName($callingClass);

        $db = new DB($tableName);
        $result = $db->get($id);

        if ($result) {
            $instance = new $callingClass;
            $instance->fill($result);
            return $instance;
        }

        return null;
    }

    public static function where($attr, $op, $val) {
        $callingClass = get_called_class();
        $tableName = self::getSnakeCaseName($callingClass);

        $db = new DB($tableName);
        $result = $db->where($attr, $op, $val);

        $instances = [];
        foreach ($result as $row) {
            $instance = new $callingClass;
            $instance->fill($row);
            $instances[] = $instance;
        }

        return $instances;
    }

    public static function whereAll($conditions) {
        $callingClass = get_called_class();
        $tableName = self::getSnakeCaseName($callingClass);

        $db = new DB($tableName);
        $result = $db->whereAll($conditions);

        $instances = [];
        foreach ($result as $row) {
            $instance = new $callingClass;
            $instance->fill($row);
            $instances[] = $instance;
        }

        return $instances;
    }

    public function delete() {
        $id = $this->attributes['id'] ?? null;

        if ($id !== null) {
            $callingClass = get_called_class();
            $tableName = self::getSnakeCaseName($callingClass);

            $db = new DB($tableName);
            return $db->delete($id);
        }

        return false;
    }

}