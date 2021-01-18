<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_user extends CI_Model
{
      
	function checkUser(){
	$sql = "SELECT * FROM pengguna WHERE username=? AND password=?";
        $data = array($this->input->post('username'),
                        $this->input->post('password'));
        $query = $this->db->query($sql,$data);
        if($query->num_rows() > 0) {
                return "true"; } 
        else {
                return "false";
	       }
        }       

        function aktifitas(){
        $query=$this->db->query("SELECT * FROM aktifitas");
        return $query->result() ;
        }

        //insert pengguna account
        function insertUser(){
        $sql = "INSERT INTO pengguna(username,password) VALUES (?,?)";
        $data = array($this->input->post('username'),
                        $this->input->post('password'));
        $query = $this->db->query($sql,$data);
        }

        //insert profil individu
        function insertPI(){
        $sql = "INSERT INTO biodata(username,nama,umur,jenis_kelamin,bBadan,tBadan,id_aktifitas) 
                VALUES (?,?,?,?,?,?,?)";
        $data= array($this->input->post('username'),
                        $this->input->post('nama'),
                        $this->input->post('umur'),
                        $this->input->post('jk'),
                        $this->input->post('berat'),
                        $this->input->post('tinggi'),
                        $this->input->post('aktifitas'));                                                                       
        $query = $this->db->query($sql,$data);
        }

        function updatePI($username,$nama,$umur,$jk,$bb,$tb,$id_aktifitas){
        $query = $this->db->query("UPDATE biodata 
                                SET nama='$nama',umur='$umur',jenis_kelamin='$jk',
                                bBadan='$bb',tBadan='$tb',id_aktifitas='$id_aktifitas' 
                                WHERE username='$username' ");        
        }

        function data_pengguna($username){
        $query=$this->db->query("SELECT * FROM biodata p JOIN pengguna u ON p.username=u.username                                   
                                        JOIN aktifitas a ON p.id_aktifitas=a.id_aktifitas
                                        WHERE p.username='$username'");
        return $query->result() ;      
        }

        function lihatProfil(){
        $query=$this->db->query("SELECT * FROM biodata");
        return $query->result() ;
        }

        function makanan(){
        $query=$this->db->query("SELECT * FROM menu_makanan");
        return $query->result() ;
        }

        function getMakanan($pilihmakanan){
        $query = $this->db->query("SELECT * FROM menu_makanan WHERE id_makanan = '$pilihmakanan' ");
        return $query->row_array();
        }
       
        function checkTanggal($tanggal){
        $sql= "SELECT * FROM record WHERE tanggal='$tanggal' " ;
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            return "true"; } 
        else {
            return "false";
              }
       }

        function insertRekamKebutuhan($tanggal,$username,$gizi,$harga){
       $sql = "INSERT INTO record(tanggal,username,kebutuhan_gizi,biaya) 
                VALUES ('$tanggal','$username','$gizi','$harga')";                                                                   
       $query = $this->db->query($sql);
       }

        function rekamKebutuhan($username){
       $sql = "SELECT * FROM record WHERE username='$username' ";                                                                   
       $query = $this->db->query($sql);
       return $query->result();
       }  
}