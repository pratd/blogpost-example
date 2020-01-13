<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class myBlogPtController extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>new controller main</p>";
    }
    function defaultView(){
        $this->view->render('myBlog/myPage');
    }
    function createBlogPost(){        
        $authorId    = $_POST['userId'];
        $postTitle   = $_POST['post title'];
        $postContent = $_POST['post content'];
        $postCategory= $_POST['post category'];
        $postAuthor  = $_POST['Author'];
        $postPublishDt = $_POST['publish date'];
        //validate if the name of the post and category already exists;
        $row_cnt = $this->model->validateEntry(['authorId'=>$authorId,'postTitle'=>$postTitle, 'postContent'=>$postContent,
        'postCategory'=>$postCategory, 'authorName'=>$postAuthor, 'publishDate'=>$postPublishDt]);
        if($row_cnt>0){
                //var_dump($authorId);
                $this->view->message ="Welcome back ". $authorId ."!";
                $blogItems = $this->model->getBlogdata(['authorId'=>$authorId]);
                //var_dump($blogItems);
                //render the blog items
                $this->view->data = $blogItems;
                $this->view->render('myBlog/myPage');
        }else{
               $this->view->message="User Id or Email not correct, please Re-enter!";
               $this->view->render('errors/passwordError');
        }       
        
    }
}

?>