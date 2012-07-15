<?php

class Usermodel extends CI_Model
{

    /**
     * Inicializa al padre 
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Inserta un user en la base de datos
     * @param array $user
     * @return type Id del user insertado
     */
    public function addUser(array $user)
    {
        $this->db->insert('user', $user);
        return $this->db->insert_id();
    }

    /**
     * Actualiza un user en la base de datos
     * @param array $user 
     */
    public function updateUser(array $user)
    {
        $this->db->update($user);
    }

    /**
     * Elimina un user de la base de datos
     * @param array $user 
     */
    public function deleteUser(array $user)
    {
        $this->db->delete($user);
    }

    /**
     * Obtiene uno, varios o todos los user
     * @param array $user
     * @return type Array
     */
    public function getUser(array $user = NULL)
    {
        if (is_null($user)) {
            $query = $this->db->get('user');
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
            return $result;
        } else {
            $query = $this->db->get_where('user', $user);
            if ($query->num_rows() > 0)
                $result = $query->row();
            return $result;
        }
    }

}