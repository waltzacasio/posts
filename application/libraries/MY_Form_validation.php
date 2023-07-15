<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->CI =& get_instance();
    }

    public function is_unique($str, $field)
    {
        list($table, $column) = explode('.', $field, 2);
        $query = $this->CI->db->limit(1)->get_where($table, array($column => $str));

        return $query->num_rows() === 0;
    }
}
