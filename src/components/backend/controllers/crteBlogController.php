<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class crteBlogController extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>new controller main</p>";
    }
    function defaultView(){
        $this->view->render('myBlog/create');
    }
    function createBlogPost(){   
        //$this->view->render('myBlog/myPage');       
       // print_r(array_keys($_SESSION));
        $authorId       = $_SESSION['userID'];
        $postTitle      = $_POST['blogTitle'];
        $postContent    = $_POST['content'];
        $postCategory   = $_POST['categories'];
        $postAuthor     = $_POST['Author_name'];
        $postPublishDt  = date("d-m-Y", strtotime($_POST['publih_date']));
        $postKeyWords   = $_POST['keywords'];
        $postStatus     = $_POST['option'];
        //validate if the name of the post and category already exists;
        $row_cnt = $this->model->validateEntry(['authorId'=>$authorId,'postTitle'=>$postTitle]);
        // if($row_cnt>0){
        //     //var_dump($authorId);
        //     $this->view->message ="Blog Name already exists";
        //     $this->view->render('errors/passwordError');
        // }else{
            $blogPostCreated = $this->model->CreateBlog(['authorId'=>$authorId, 'postTitle'=>$postTitle, 'postContent'=>$postContent,
            'postCategory'=>$postCategory, 'postAuthor'=>$postAuthor, 'postPublishDate'=>$postPublishDt, 'key_words'=>$postKeyWords,
            'postStatus'=>$postStatus]);
        // }
            //var_dump($blogItems);
        //render the blog items
        $this->view->message ="Welcome to your Blog ". $postAuthor."!";
        $blogPost = $this->model->getBlogdata(['authorId'=>$authorId]);
            //var_dump($blogItems);
            //render the blog items
        $this->view->data = $blogPost;
        $this->view->render('myBlog/myPage');       
        
    }
}

?>