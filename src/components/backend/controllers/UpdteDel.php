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
    function updateBlogPost(){        
        $authorId       = $_POST['userId'];
        $postTitle      = $_POST['post title'];
        $postId         = $_POST['post Id'];
        // $postContent    = $_POST['post content'];
        // $postCategory   = $_POST['post category'];
        // $postAuthor     = $_POST['Author'];
        // $postPublishDt  = $_POST['publish date'];
        // $postKeyWords   = $_POST['key words'];
        // $postStatus     = $_POST['status'];
        //validate if the name of the post and category already exists;
        $row_cnt = $this->model->validateEntry(['authorId'=>$authorId,'postTitle'=>$postTitle]);
        if($row_cnt>0){
            //var_dump($authorId);
            $this->view->message ="Blog Name already exists";
            $this->view->render('errors/passwordError');
        }else{
            $blogPostCreated = $this->model->CreateBlog(['authorId'=>$authorId, 'postTitle'=>$postTitle, 'postContent'=>$postContent,
            'postCategory'=>$postCategory, 'postAuthor'=>$postAuthor, 'postPublishDate'=>$postPublishDt, 'key_words'=>$postKeyWords,
            'postStatus'=>$postStatus]);
            //var_dump($blogItems);
            //render the blog items
            $blogPost = $this->model->getBlogdata(['authorId'=>$authorId]);
            //var_dump($blogItems);
            //render the blog items
            $this->view->data = $blogItems;
            $this->view->render('myBlog/myPage');
              
        }       
    }
    function deleteBlogPost(){        
        $authorId       = $_POST['userId'];
        $postTitle      = $_POST['post title'];
        $postContent    = $_POST['post content'];
        $postCategory   = $_POST['post category'];
        $postAuthor     = $_POST['Author'];
        $postPublishDt  = $_POST['publish date'];
        $postKeyWords   = $_POST['key words'];
        $postStatus     = $_POST['status'];
        //validate if the name of the post and category already exists;
        $row_cnt = $this->model->validateEntry(['authorId'=>$authorId,'postTitle'=>$postTitle]);
        if($row_cnt>0){
            //var_dump($authorId);
            $this->view->message ="Blog Name already exists";
            $this->view->render('errors/passwordError');
        }else{
            $blogPostCreated = $this->model->CreateBlog(['authorId'=>$authorId, 'postTitle'=>$postTitle, 'postContent'=>$postContent,
            'postCategory'=>$postCategory, 'postAuthor'=>$postAuthor, 'postPublishDate'=>$postPublishDt, 'key_words'=>$postKeyWords,
            'postStatus'=>$postStatus]);
            //var_dump($blogItems);
            //render the blog items
            $blogPost = $this->model->getBlogdata(['authorId'=>$authorId]);
            //var_dump($blogItems);
            //render the blog items
            $this->view->data = $blogItems;
            $this->view->render('myBlog/myPage');
              
        }       
    }
}

?>