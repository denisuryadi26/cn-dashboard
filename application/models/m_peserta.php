<?php
class M_peserta extends CI_Model{

    public function __construct() {
            parent::__construct();
    }

  function get_peserta(){
    $result = $this->db->get('peserta')->result();
    return $result;
  }

  function get_peserta_by_id($id){
    $result = $this->db->get_where('peserta', array('id' => $id))->result();
    return $result;
  }

  function get_total_peserta(){
    $result = $this->db->get('peserta')->num_rows();
    return $result;
  }

  function add_peserta($data){
    // $data = array(
    //   'nama_lengkap' => $nama_lengkap,
    //   'nik' => $nik,
    //   'tempat_lahir' => $tempat_lahir,
    //   'tgl_lahir' => $tgl_lahir,
    //   'email' => $email,
    //   'no_hp' => $no_hp,
    //   'alamat' => $alamat,
    //   'kota' => $kota,
    //   'unit' => $unit,
    //   'photo' => $photo,
    //   'jabatan' => $jabatan,
    //   'status' => $status
    // );
    // var_dump($data);die;
    // $this->db->insert('peserta',$data);
    try{
        // var_dump($data);die;
        $this->db->insert('peserta', $data);
        return true;
      }catch(Exception $e){
      }
  }

  function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('peserta');
   }

}