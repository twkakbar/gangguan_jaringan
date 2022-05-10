<?php
class M_Jalan extends CI_Model{
    function lihat_jalan()
    {
        $query=$this->db->query("SELECT * FROM `jalan` LEFT JOIN kabupaten on kabupaten.id_kabupaten=jalan.id_kabupaten LEFT JOIN kecamatan on kecamatan.id_kecamatan=jalan.id_kecamatan");
        return $query->result();
    }

    function jalan($id)
    {
        $query=$this->db->query("SELECT * FROM `jalan` LEFT JOIN kabupaten on kabupaten.id_kabupaten=jalan.id_kabupaten LEFT JOIN kecamatan on kecamatan.id_kecamatan=jalan.id_kecamatan WHERE jalan.kode_pop='$id'");
        return $query->result();
    }

    function tambah_jalan($new_name)
    {
      $document= $new_name;
      $dokument=str_replace(" ","_",$document);
      $jalan = array(
          'kode_pop'     =>$this->input->post('kode_pop'),
          'no_pop'       =>$this->input->post('no_pop'),       
          'nama_jalan'    =>$this->input->post('nama_jalan'),
          'dari'          =>$this->input->post('dari'),
          'ke'            =>$this->input->post('ke'),
          'id_kabupaten'  =>$this->input->post('id_kabupaten'),
          'id_kecamatan'  =>$this->input->post('id_kecamatan'),
          'peta'  =>$this->input->post('peta'),
          'dokument'      =>$document
      );
      $fungsi = array(
          'kode_pop'     =>$this->input->post('kode_pop'),
          'kode_fungsi'  =>$this->input->post('kode_pop'),
          'nama_kjp'      =>$this->input->post('nama_kjp'),
          'no_kjp'        =>$this->input->post('no_kjp'),
          'keterangan'    =>$this->input->post('keterangan')
      );
      $cek=$this->db->insert('jalan',$jalan);
      $cek2=$this->db->insert('fungsi',$fungsi);
      return $cek;
    }

    function edit_jalan($id,$document)
    {
      $jalan = array(
          'no_pop'       =>$this->input->post('no_pop'),
          'nama_jalan'    =>$this->input->post('nama_jalan'),
          'dari'          =>$this->input->post('dari'),
          'ke'            =>$this->input->post('ke'),
          'id_kabupaten'  =>$this->input->post('id_kabupaten'),
          'id_kecamatan'  =>$this->input->post('id_kecamatan'),
          'peta'          =>$this->input->post('peta'),
          'dokument'      =>$document

      );
      $this->db->where('kode_pop',$id);
      $cek=$this->db->update('jalan',$jalan);
      $cek1=$this->db->update('fungsi',$fungsi);
      return $cek1;
    }

    function proses_hapus_jalan($id)
    {

        $query=$this->db->query("DELETE jalan.* from jalan WHERE jalan.kode_pop='$id'");
        return $query;
    }

    function detail_jalan()
    {
        $query=$this->db->query("");
        return $query->result();
    }

    public function jalan_kecamatan($id)
    {
      return $this->db->get_where('jalan', "id_kecamatan = $id")->result();
    }

    public function satu_jalan($id)
    {
      return $this->db->get_where('jalan', "kode_pop = '$id'")->result();
    }
}
