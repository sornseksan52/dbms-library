<?php
Class User extends CI_Model
{
 function login($username, $passwd)
 {
   $this -> db -> select('username, passwd');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('passwd', MD5($passwd));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function Listbooks($username){
   $this -> db -> select('*');
   $this -> db -> from('user_borrowed');
   $this -> db -> where('username', $username);
   //$this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows()>0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }

 }

 function queryBooks($criteria,$query_string){
    $this->db->select('*');
    $this->db->from('books');
    $where = $criteria . ' like "%' . $query_string . '%"';
    $this->db->where($where);
    $query = $this -> db -> get();
    if($query -> num_rows()>0)
    {
     return $query->result();
    }
    else
    {
     return false;
    }


 }
}
?>
