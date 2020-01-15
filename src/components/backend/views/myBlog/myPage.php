<!Doctype html>
<html lang=en>
    <head>
    <title></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body>
        <?php 
        $upOne = dirname(__DIR__,1);
        require $upOne . '/header.php';
        ?>
        
        <div id="main">
            <h5 class="center"><?php echo $this->message;?></h5>
        </div>
        <div class="container mt-4" id="createblog">
            <div class="row mb-4 container">
                <a href="<?php echo constant('URL');?>crteBlogController/defaultView">Create Blog</a>
            </div>
        </div>
        <!-- BLOG POSTS -->
        <div class="container mt-4 border border-light" id="myBlog">
            <?php $upOne = dirname(__DIR__,2);
                include_once $upOne . '/models/blogData.php';
                foreach ($this->data as $row) {
                $blog = new blogData();
                $blog = $row;
            ?>
            <div class="row d-flex justify-content-center mr-5" id = "<?php echo $blog->post_id?>">
                <div class="col-5 offset-3">
                    <h3 class="biggerfont post-title mr-6"><?php echo $blog->postTitle;?></h3>
                </div>
                <div class="col-2 offset-2">
                    <p class="small-font"> Status: <?php echo $blog->post_status;?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p class="small-font">Author: <?php echo $blog->postAuthor;?></p>
                </div>
                <div class="col-2 offset-2">
                    <p class="small-font">Date: <?php echo $blog->post_publish_date;?></p>    
                </div>
                <div class="col-2 offset-3">
                    <p class="small-font">Keywords: <?php echo $blog->keyWords;?></p>
                </div>
            </div>
            <div class="row">
                <div class="d-sm-flex">
                    <p class="small-font">Category: <?php echo $blog->post_category;?></p>
                    <a href="<?php echo constant('URL') .'updteDelController/updateBlogPost/' . $blog->post_id;?>" class="small-font">(Edit/</a>
                    <a href="<?php  echo constant('URL') . 'updteDelController/deleteBlogPost/' . $blog->post_id;?>" class="small-font">Delete)</a>
                </div>
            </div>
            <div class="row">
                <p><?php echo $blog->post_content;?></p>
            </div>
            <div class="row">
                <div class="col-2 mt-2 mb-2 d-sm-inline-flex">
                    <a href="<?php echo constant('URL') .'updteDelController/updateBlogPost/' . $blog->post_id;?>" class="small-font">Edit/</a>
                    <a href="<?php  echo constant('URL') . 'updteDelController/deleteBlogPost/' . $blog->post_id;?>" class="small-font">Delete Post</a>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mt-2">
                    <input class="text-input"></input> <!--comment-->
                </div>
            </div>
            <div class="row">
                <div class="col-1 d-sm-flex">
                    <button type="button" class="btn btn-primary">Comment</button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-1 d-sm-flex">
                    <button type="button" class="btn btn-primary">Delete</button>
                </div>
            </div>
        <?php }; ?>
        </div>
        <?php   $upOne = dirname(__DIR__,1);
        require $upOne . '/footer.php';?>
    </body>
</html>