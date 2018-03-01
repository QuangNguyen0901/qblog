<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($row as $post) { ?>
                <div class="post-preview">
                    <a href="?m=post&a=view&id=<?php echo $post['id'] ?>">
                        <h2 class="post-title">
                            <?php echo $post['title'] ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo $post['short_des'] ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted on <?php echo $post['created_at'] ?></p>
                </div>
                <hr>
                <?php
            }
            ?>
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="?m=post&a=list">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>