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
        $sql = "select q.id, q.quote, a.name 'author', u.alias, q.posted_id, u.name 'poster', q.created_at from quotes q join  authors a on a.id = q.author_id join users u on u.id = q.posted_id order by q.created_at desc";
        return $this->db->query($sql)->result_array();   
    }
    function getQuotesAddedByPoster($id)
    {
        $sql = "select q.quote, a.name 'author', u.alias, q.posted_id, u.name 'poster', q.created_at from quotes q join  authors a on a.id = q.author_id join users u on u.id = q.posted_id where u.id =?";
        $vals = [$id];
        return $this->db->query($sql, $vals)->result_array();      
    }
    function getQuoteCountByPoster($id){
        $sql = "select count(id) from quotes where posted_id = ? group by posted_id";
        $vals = [$id];
        return $this->db->query($sql, $vals)->row_array();
    }
    function getAllFavorites()
    {
        $sql = "select q.id, q.quote, a.name 'author', u.alias, u.name 'poster', q.created_at from quotes q join  authors a on a.id = q.author_id join users u on u.id = q.posted_id join favorites f on f.quote_id = q.id and f.user_id = u.id where u.id =?";
        $vals = [$this->session->userdata['id']];
        return $this->db->query($sql, $vals)->result_array();
    }
    function addToFavorites($quoteInfo)
    {
        $sql = "insert into favorites (user_id, quote_id, created_at, updated_at) values (?, ?, now(), now())";
        //var_dump($quoteInfo); die();
        $vals = [$this->session->userdata['id'], $quoteInfo['id']];
        $this->db->query($sql, $vals);
    }
    function remove($quoteInfo)
    {
        $sql = "delete from favorites where quote_id = ?";
        $vals = [$id];
        $this->db->query($sql, $vals);   
    }
}
?>
