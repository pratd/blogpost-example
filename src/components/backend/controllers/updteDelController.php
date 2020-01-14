<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class updteDelController extends Controller{

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
        //get the data entry for delete from blogposts
        $blogItems = $this->model->getBlogdata(['authorId'=>$authorId]);
        $this->view->data = $blogItems;
        $this->view->render('myBlog/Edit');
    }
    function updateExecute(){
        $authorId       = $_POST['userId'];
        $postTitle      = $_POST['post title'];
        $postId         = $_POST['post Id'];
        $postContent    = $_POST['post content'];
        $postCategory   = $_POST['post category'];
        $postAuthor     = $_POST['Author'];
        $postPublishDt  = $_POST['publish date'];
        $postKeyWords   = $_POST['key words'];
        $postStatus     = $_POST['status'];
        $updatedBlog    = $this->model-> updateBlog(['authorId'=>$authorId, 'postTitle'=>$postTitle, 'postContent'=>$postContent,
        'postCategory'=>$postCategory, 'postAuthor'=>$postAuthor, 'postPublishDate'=>$postPublishDt, 'key_words'=>$postKeyWords,
        'postStatus'=>$postStatus]);
        $this->view->data = $blogItems;
        $this->view->render('myBlog/myPage');     
    }
    function deleteBlogPost(){        
        $authorId       = $_POST['userId'];
        $postTitle      = $_POST['post title'];
        
        $deleteBlog     =  $this->model->deleteBlog(['authorId'=>$authorId, 'postTittle'=>$postTitle]);
        $this->view->data = $deleteBlog;
        $this->view->render('myBlog/myPage');
              
          
    }
}

?>