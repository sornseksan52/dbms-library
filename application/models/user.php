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

    function register($username){
        $this -> db -> select('username');
        $this -> db -> from('users');
        $this -> db -> where('username', $username);
        $this -> db -> limit(1);

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

    function adduser($username,$password,$email){
        $data = array(
            'username' => $username,
            'passwd' => md5($password),
            'email_addr' => $email
        );
        $this->db->insert('users',$data);
    }

    function Listbooks($username){
        $this -> db -> select('*');
        $this -> db -> from('user_borrowed');
        $this->db->join('books','user_borrowed.number = books.number','inner');
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

    function leaveMessage($username,$content){
        $date = date('y-m-d-G-i-s');
        $record = array(
            'name'=> $username,
            'message_date'=> $date,
            'content'=> $content
        );
        $this->db->insert('guestbooks',$record);
    }
    function listMessage(){
        $this->db->select('*');
        $this->db->from('guestbooks');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function borrowBooks($username,$booknumbers){
        $user_borrow = array();
        $this->db->select('user_borrowed.username,bookname,number,users.email_addr');
        $this->db->from('user_borrowed,users');
        $this->db->where('user_borrowed.username = users.username');
        $query = $this->db->get();
        $result = $query->result();

        $nonavailable = array();
        foreach($result as $row){
            //these book is not available
            $nonavailable["$row->number"] = $row->email_addr;
        }
        $callbooks = array();
        foreach($booknumbers as $number){
            if(!array_key_exists("$number",$nonavailable)){
                //this book is available
                //insert a new record into user_borrowed
                $this->db->select('bookname');
                $this->db->from('books');
                $this->db->where('number',$number);
                $this->db->limit(1);
                $bookname = $this->db->get()->result();
                $record = array(
                    'username'=> $username,
                    'bookname'=> $bookname[0]->bookname,
                    'number'=> $number,
                    'borrow_date' => date("F j, Y, g:i a")
                );
                $this->db->insert('user_borrowed',$record);
                //update books state
                $data = array(
                    'state' => '借出中'
                );
                $this->db->where('number',$number);
                $this->db->update('books',$data);
            }else{
                $callbooks[$number] = $nonavailable[$number];
                $this->sendEmail($number,$callbooks[$number]);
            }

        }

    }

    function sendEmail($number,$email,$information = ""){
        $this->load->library('email');
        $manager=mb_encode_mimeheader('資料庫系統圖書館管理員', 'UTF-8');
        $this->email->from('qrnnis2623891@gmail.com',$manager);
        $this->email->to($email);
        $this->email->subject('dbms library message');
        if($information == ""){
            $information = "請歸還書號 $number";
        }
        $this->email->message($information);
        $this->email->send();
    }

    function returnBooks($booknumbers){
        foreach($booknumbers as $number){
            $this->db->delete('user_borrowed',array('number' =>$number));
            $data = array('state' => '在架上');
            $this->db->update('books',$data,array('number' =>$number));
        }
    }
    function queryBooks($criteria,$query_string){
        $this->db->select('*');
        $this->db->from('books');
        if(strlen($criteria)>0 and strlen($query_string)>0){
            $where = $criteria . ' like "%' . $query_string . '%"';
            $this->db->where($where);
        }
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

    function addBooks($data){
        $this->db->select('max(number) as number');
        $this->db->from('books');
        $row = $this->db->get()->result();
        $data['number'] = (int)$row[0]->number+1;
        $record = array(
            'bookname' =>$data['bookname'],
            'author' => $data['author'],
            'number' => $data['number'],
            'publish' => $data['publish'],
            'state' => '在架上',
            'class' => $data['class']
        );
        //send email to all users
        $this->db->insert('books',$record);

        $this->db->select('email_addr');
        $this->db->from('users');
        $query = $this->db->get();
        $result = $query->result();
        $information = "新書來了！！名稱是\"$data[bookname]\"，系統書號為$data[number]";
        foreach($result as $row){
            $this->sendEmail($data['number'],$row->email_addr,$information);
        }
    }

    function deleteBooks($data){
        $delete_books = $data['delete_books'];
        foreach($delete_books as $number){
            $this->db->where('number',$number);
            $this->db->delete('books');
        }

    }
    function updateBooks($data){
        $number = $data['update_book'];
        $bookname = $data['bookname'];
        $author = $data['author'];
        $publish = $data['publish'];
        $class = $data['class'];
        $record = array();
        if($bookname != ''){ $record['bookname'] = $bookname; }
        if($author != ''){ $record['author'] = $bookname; }
        if($author != ''){ $record['publish'] = $publish; }
        if($author != ''){ $record['class'] = $class; }
        $this->db->where('number',$number);
        $this->db->update('books',$record);

    }
}
?>
