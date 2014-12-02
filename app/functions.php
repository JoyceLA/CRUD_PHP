<?php
/**
 * Funciones
 *
 * PHP version 5.5.9
 *
 * @category Class
 * @package  
 * @author   <lumajo@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 *
 */
/**
 * Funciones
 *
 * @category Class
 * @package  
 * @author   <lumajo@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 *
 */
class Funciones
{
    public $create = -2;
    public $delete = -2;
    public $update = -2;
    public $search = -2;

    public function getMessageUpdate()
    {
        if ($this->update == 1) {
            return "USUARIO ACTUALIZADO";
        } elseif ($this->update == -1) {
            return "ERROR CUENTA NO ENCONTRADA";
        } elseif ($this->update == 0) {
            return "USUARIO O CONTRASEÑA INVALIDO";
        }
    }

    public function updateProfile($users, $userNow, $userNew)
    {
        $longitud = count($users);
        $boolean = 0;
        if ($longitud >0) {
            if ($userNew->getUser() == "") {
                $this->update = 0;
                $boolean = 1;
            }
            if ($userNew->getPassword() == "") {
                $this->update = 0;
                $boolean = 1;
            }
            if ($boolean == 0) {
                for ($i = 0; $i < $longitud; $i++) {
                    if ($users[$i]->getUser() == $userNow->getUser()) {
                        if ($users[$i]->getPassword() == $userNow->getPassword()) {
                            $users[$i]->setUser($userNew->getUser());
                            $users[$i]->setPassword($userNew->getPassword());
                            $this->update = 1;
                        }
                    }
                }
                if ($this->update != 1) {
                    $this->update = -1;
                }
            }
        } else {
            $this->update = -1;
        }

        return $users;
    }
    public function getMessageSearch()
    {
        if ($this->search == 1) {
            return "CUENTA ENCONTRADA";
        } elseif ($this->search == -1) {
            return "ERROR CUENTA NO ENCONTRADA";
        } elseif ($this->search == 0) {
            return "USUARIO O CONTRASEÑA INVALIDO";
        }
    }

    public function searchUser($users, $userNow)
    {
        $longitud = count($users);
        $boolean = 0;
        if ($longitud >0) {
            if ($userNow->getUser() == "") {
                $this->search = 0;
                $boolean = 1;
            }
            if ($userNow->getPassword() == "") {
                $this->search = 0;
                $boolean = 1;
            }
            if ($boolean == 0) {
                for ($i = 0; $i < $longitud; $i++) {
                    if ($users[$i]->getUser() == $userNow->getUser()) {
                        if ($users[$i]->getPassword() == $userNow->getPassword()) {
                            $this->search = 1;
                        }
                    }
                }
                if ($this->search != 1) {
                    $this->search = -1;
                }
            }
        } else {
            $this->search = -1;
        }

        return $users;
    }

    public function getMessageDelete()
    {
        if ($this->delete == 1) {
            return "CUENTA ELIMINADA";
        } elseif ($this->delete == -1) {
            return "ERROR CUENTA NO ENCONTRADA";
        } elseif ($this->delete == 0) {
            return "USUARIO O CONTRASEÑA INVALIDO";
        }
    }

    public function deleteUser($users, $userNow)
    {
        $longitud = count($users);
        $boolean = 0;
        if ($longitud >0) {
            if ($userNow->getUser() == "") {
                $this->delete = 0;
                $boolean = 1;
            }
            if ($userNow->getPassword() == "") {
                $this->delete = 0;
                $boolean = 1;
            }
            if ($boolean == 0) {
                for ($i = 0; $i < $longitud; $i++) {
                    if ($users[$i]->getUser() == $userNow->getUser()) {
                        if ($users[$i]->getPassword() == $userNow->getPassword()) {
                            unset($users[$i]);
                            $this->delete = 1;
                        }
                    }
                }
                if ($this->delete != 1) {
                    $this->delete = -1;
                }
            }
        } else {
            $this->delete = -1;
        }

        return $users;
    }

    public function getMessageCreate()
    {
        if ($this->create == 1) {
            return "CUENTA YA EXISTE";
        } elseif ($this->create == -1) {
            return "CUENTA CREADA";
        } elseif ($this->create == 0) {
            return "USUARIO O CONTRASEÑA INVALIDO";
        }
    }

    public function createUser($users, $userNew)
    {
        $longitud = count($users);
        $boolean = 0;
        if ($longitud >0) {
            if ($userNew->getUser() == "") {
                $this->create = 0;
                $boolean = 1;
            }
            if ($userNew->getPassword() == "") {
                $this->create = 0;
                $boolean = 1;
            }
            if ($boolean == 0) {
                for ($i = 0; $i < $longitud; $i++) {
                    if ($users[$i]->getUser() == $userNew->getUser()) {
                        if ($users[$i]->getPassword() == $userNew->getPassword()) {
                            $this->create = 1;
                        }
                    }
                    if ($i == ($longitud-1)) {
                        $this->create = -1;
                    }
                }

                $users[$longitud] = $userNew;
            }
        }

        return $users;
    }
    
    /*FUNCION PARA PROBAR EL MOCK*/
    public function encryptPass()
    {
       return "RASAHolaRSSA";
    }
}
