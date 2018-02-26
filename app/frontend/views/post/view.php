<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

                <div class="post-preview">
                    <a>
                        <h2 class="post-title">
                            <?php echo $row['title'] ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo $row['content'] ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted on <?php echo $row['created_at'] ?></p>
                </div>
                <hr>
        </div>
    </div>
</div>