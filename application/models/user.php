<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
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
   $this -> db -> select('bookname');
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
}
?>
