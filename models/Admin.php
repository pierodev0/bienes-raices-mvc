<?php
namespace Model;

class Admin extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password',];
    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = "El correo es obligatorio";
        }
        if (!$this->password) {
            self::$errores[] = "El password es obligatorio";
        }
        if ($this->password && strlen($this->password) < 6) {
            self::$errores[] = "El password debe tener al menos 6 caracteres";
        }
        return self::$errores;
    }
}