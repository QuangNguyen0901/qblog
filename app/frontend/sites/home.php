<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($row as $row1) { ?>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            <?php echo $row1['id'] ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo $row1['name'] ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        on September 24, 2018</p>
                </div>
                <hr>
                <?php
            }
            ?>
        </div>
    </div>
</div>