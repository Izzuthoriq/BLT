<?php
class M_laporan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_laporan()
    {
        $query = $this->db->get('laporan'); // Asumsikan nama tabelnya 'laporan'
        return $query;
    }
}
