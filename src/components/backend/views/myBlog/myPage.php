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
        <div id="myBlog">
            <?php $upOne = dirname(__DIR__,2);
                include_once $upOne . '/models/blogData.php';
                foreach ($this->data as $row) {
                $blog = new blogData();
                $blog = $row;
                ?>
            <div id = "<?php echo $blog->post_id?>" class= "container mt-4 border border-light">
                <div class="row">
                    <div class="col-3">
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </div>
                    <div class="col-2 offset-2">
                        <h2><?php echo $blog->postTitle?></h2>
                    </div>
                    <div class="col-2 offset-3">
                        <a href="#">Edit Post/</a>
                        <a href="#">Delete Post</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p class="small-font">Keywords: Travel, Thailand, Hotels</p>
                    </div>
                    <div class="col-2 offset-3">
                        <p>Date: <?php echo $blog->post_publish_date?></p>    
                    </div>
                    <div class="col-2 offset-3">
                        <p class="small-font">Author: <?php echo $blog->postAuthor?></p>
                    </div>
                </div>
                <div class="row">
                    <p><?echo $blog->post_content?></p>
                </div>
                <div class="row">
                    <div class="col-2">
                        <textarea rows="1" cols="90"> </textarea>
                    </div>
                    <div class="col-1 offset-5">
                        <button type="button" class="btn btn-primary comment">Comment</button>
                    </div>
                    <div class="col-2 ml-2">
                        <button type="button" class="btn btn-primary delete">Delete Comment</button>
                    </div>
                </div>
            </div>
        <?php }; ?>
        </div>
        <?php   $upOne = dirname(__DIR__,1);
        require $upOne . '/footer.php';?>
    </body>
</html>