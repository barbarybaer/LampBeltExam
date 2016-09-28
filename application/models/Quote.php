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
        $sqlSelect = "select * from authors where name = ?";
        $vals = [$quoteInfo['author']];
        $author = $this->db->query($sqlSelect, $vals)->row_array();
        if (!$author['id']){
            $sqlInsert = "insert into authors (name) values (?)";
            $vals = [$quoteInfo['author']];
            $this->db->query($sqlInsert, $vals);
            $author = $this->db->query($sqlSelect, $vals)->row_array();
        }
        $sql = "insert into quotes (posted_id,author_id,quote, created_at,updated_at) values (?,?,?,now(),now())";
        $vals= [$this->session->userdata['id'],$author['id'],$quoteInfo['message']];
        
        $this->db->query($sql, $vals);
        return true;
    }
    
    function getAllQuotes()  {
        $sql = "select q.id, q.quote, a.name 'author', u.alias, q.posted_id, u.name 'poster', q.created_at from quotes q join  authors a on a.id = q.author_id join users u on u.id = q.posted_id where q.id not in (select quote_id from favorites where user_id = ?) order by q.created_at desc";
        $vals=[$this->session->userdata['id']];
        return $this->db->query($sql,$vals)->result_array();   
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
        $sql = "select u.id 'userid', q.id, q.quote, a.name 'author', u2.alias, u2.name 'poster', u2.id 'posted_id', q.created_at from favorites f left join quotes q on f.quote_id = q.id left join  authors a on a.id = q.author_id left join users u on u.id = f.user_id left join users u2 on u2.id = q.posted_id where u.id =?";
        $vals = [$this->session->userdata['id']];
        return $this->db->query($sql, $vals)->result_array();
    }
    function addToFavorites($quoteInfo)
    {
        $sql = "insert into favorites (user_id, quote_id, created_at, updated_at) values (?, ?, now(), now())";
        // var_dump($quoteInfo); die();
        $vals = [$this->session->userdata['id'], $quoteInfo['id']];
        $this->db->query($sql, $vals);
    }
    function removeFromQuotesDisplay($quoteInfo)
    {

    }
    function remove($quoteInfo)
     {
        $sql = "delete from favorites where quote_id = ?";
        $vals = [$quoteInfo['id']];
        $this->db->query($sql, $vals);   
    }
}
?>
