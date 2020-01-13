<?php
class crteBlog extends Model{
    //extending the parent model
    public function __construct(){
        parent::__construct();
    }
    //update the data entry
    public function updateBlog($data){
        $userId         = $data['authorId'];
        $authorName     = $data['Author'];
        $postTitle      = $data['postTitle'];
        $postKeywords   = $data['key_words'];
        $postContent    = $data['postContent'];
        $postCategory   = $data['postCategory'];
        $postDate       = $data['postPublishDate'];
        $postStatus     = $data['postStatus'];
        $items=[];
        try{
            $queryBlog = $this->db->connect()->prepare('INSERT INTO BlogPost(post_title, key_words, post_author, author_id
            post_status, post_date, post_publish_date, post_category ) VALUES (:post_title, :key_words, :post_author, :author_id
            :post_status, :post_date, :post_publish_date, :post_category)');
            $queryBlog->execute(['post_title'=>$postTitle, 'key_words'=>$postKeywords, 'post_author'=>$authorName,
            'author_id'=>$userId, 'post_status'=>$postStatus, 'post_date'=>date('Y-m-d H:i:s'), 'post_publish_date'=>$postDate,
            'post_category'=>$postCategory]);
            //execution of data
            echo"data executed";
        }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }
    //delete the data entry

}
?>