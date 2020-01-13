<?php
class myBlogPt extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function validateUser($data){
        try{
            $userId     = $data['authorId'];
            $userEmail  = $data['user_login'];
            $password   = $data['password'];
            $check=$this->db->connect()->prepare("SELECT * FROM adminblog WHERE author_id='$userId' AND user_login='$userEmail' AND
            user_pass='$password'");
            $checkRows  =$check->execute();
            $rows = $check->fetchAll();
            $nRows = count($rows); 
            //var_dump($nRows) ;
            return $nRows;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

    public function getBlogdata($data){
        $userId = $data['authorId'];
        $items=[];
        try{
            $queryBlog = $this->db->connect()->prepare("SELECT * FROM BlogPosts WHERE BlogPosts.author_id='$userId' ");
            $blogs = $queryBlog->execute();
            while ($row = $queryBlog->fetchall()) {
                $blogPost = new blogData();
                $blogPost->$postTitle= $row['post_title'];
                $blogPost->$post_content=$row['post_content'];
                $blogPost->$post_publish_date=$row['post_publish_date'];
                $blogPost->$post_category=$row['post_category'];
                $blogPost->$post_status=$row['post_status'];
                $blogPost->$postAuthor=$row['post_author'];
                $blogPost->$keyWords = $row['key_words'];
                $blogPost->$post_id = $row['post_id'];
                $blogPost->$post_athor_id=$row['author_id'];
                array_push($items,$blogPost);
            }
        return $items;
        }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }

}
?>