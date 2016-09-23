<?php
class Quote extends CI_Model{
	function getUser($userInfo)
    {
        $sql = "SELECT * FROM users WHERE email = ? and password = ?";
        $vals = [$userInfo['email'],md5($userInfo['password'])];
        return $this->db->query($sql, $vals)->row_array();
	}

	function addQuote($quoteInfo)
    {
        $sql = "select * from authors where name = ?";
        $vals = [$quoteInfo['author']];
        $author = $this->db->query($sql, $vals)->row_array();
        if (!$author){
            $sql = "insert into authors (name) values (?)";
            $vals = [$quoteInfo['author']];
            $author = $this->db->query($sql, $vals);
        }
        $sql = "insert into quotes (posted_id,author_id,quote, created_at,updated_at) values (?,?,?,now(),now())";
        $vals= [$this->session->userdata['id'],$author['id'],$quoteInfo['message']];
        
        $this->db->query($sql, $vals);
    }
    function getAllQuotes()  {
        $sql = "select q.quote, a.name 'author', u.alias, u.name 'poster', q.created_at from quotes q join  authors a on a.id = q.author_id join users u on u.id = q.posted_id";
        return $this->db->query($sql)->result_array();   
    }
    function getQuotesPostedByUser()
    {
        $sql = "select q.quote, a.name 'author', u.alias, u.name 'poster', q.created_at from quotes q join  authors a on a.id = q.author_id join users u on u.id = q.posted_id where u.id =?";
        $vals = [$this->session->userdata['id']];
        return $this->db->query($sql, $vals)->result_array();      
    }
    function getFavoriteQuotes()
    {
        $sql = "select q.quote, a.name 'author', u.alias, u.name 'poster', q.created_at from quotes q join  authors a on a.id = q.author_id join users u on u.id = q.posted_id join favorites f on f.quote_id = q.id and f.user_id = u.id where u.id =?";
        $vals = [$this->session->userdata['id']];
        return $this->db->query($sql, $vals)->result_array();
    }
}
?>
