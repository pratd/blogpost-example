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
            $queryBlog = $this->db->connect()->query("SELECT BlogPosts.*, BlogComments.* FROM BlogPosts Left JOIN 
            BlogComments ON BlogPosts.post_id = BlogComments.comment_post_id ");
            $blogs = $queryBlog->execute(); 
            $store=[];
            $flag=0;
            while ($row = $queryBlog->fetch()) {
                //echo"123";
               // print_r($row);
                array_push($store, $row[0]) ;// store post ids as unique flag variables
                if ($flag-1>=0){
                    if($store[$flag]!== $store[$flag-1]){
                        $blogPost = new blogData();
                        $blogPost->postTitle= $row['post_title'];
                        $blogPost->post_content=$row['post_content'];
                        $blogPost->post_publish_date=$row['post_publish_date'];
                        $blogPost->post_category=$row['post_category'];
                        $blogPost->post_status=$row['post_status'];
                        $blogPost->postAuthor=$row['post_author'];
                        $blogPost->keyWords = $row['Key_words'];
                        $blogPost->post_id = $row['post_id'];
                        $blogPost->post_author_id=$row['author_id'];
                        $blogPost->addComments($row['comment_author'],$row['comment_content'],
                        $row['comment_author_id'],$row['comment_id']);
                    }else{
                        $blogPost->addComments($row['comment_author'],$row['comment_content'],
                        $row['comment_author_id'],$row['comment_id']);
                    }
                }else{
                    $blogPost = new blogData();
                    $blogPost->postTitle= $row['post_title'];
                    $blogPost->post_content=$row['post_content'];
                    $blogPost->post_publish_date=$row['post_publish_date'];
                    $blogPost->post_category=$row['post_category'];
                    $blogPost->post_status=$row['post_status'];
                    $blogPost->postAuthor=$row['post_author'];
                    $blogPost->keyWords = $row['Key_words'];
                    $blogPost->post_id = $row['post_id'];
                    $blogPost->post_author_id=$row['author_id'];
                    $blogPost->addComments($row['comment_author'],$row['comment_content'],
                    $row['comment_author_id'],$row['comment_id']);
                }
                
                // $blogPost->comment_author=$row['comment_author'];
                // $blogPost->comment_content = $row['comment_content'];
                // $blogPost->comment_author_id= $row['comment_author_id'];
                // $blogPost->comment_id=$row['comment_id'];
                array_push($items,$blogPost);
                //print_r($store[0]);
                $flag+=1;
            }
        //print_r($items[0]);
        return $items;
        }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }

}
?>