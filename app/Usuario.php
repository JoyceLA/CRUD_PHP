<?php
/**
 * Usuario
 *
 * PHP version 5.5.9
 *
 * @category Class
 * @package  App
 * @author   <lumajo@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 *
 */
/**
 * Usuario
 *
 * @category Class
 * @package  App
 * @author   <lumajo@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 *
 */
class Usuario
{
    private $_user;
    private $_password;

    public function Usuario($us, $pass)
    {
        $this->user = $us;
        $this->password = $pass;
    }

    public function setUser($usuario)
    {
        $this->user = $usuario;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setPassword($pass)
    {
        $this->password = $pass;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
