<?php
//print_r($_SESSION);
?>
<?php
if (!empty($_SESSION['flash'])) {
    echo
        '<div class="box-body">
        <div class="alert ' . $_SESSION['flash']['type'] . ' alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ' .
        $_SESSION['flash']['msg'] . '
         </div>
    </div>';
};
?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Book List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" action="/app/backend/sites/book/book_add.php" method="post" >
                <div class="form-group">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="bookname" placeholder="New book">
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-info pull-right btn-sm">Add</button>
                    </div>
                </div>
            </form>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Book Name</th>
                    <th>Tag</th>
                    <th>Owner</th>
                    <th>Edited</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($row as $book) { ?>
                    <tr>
                        <td><label>
                                <input type="checkbox" class="minimal">
                            </label></td>
                        <td><a href="?m=newword&a=word_list&book_id=<?php echo $book['id']?>"><?php echo $book['bookname'] ?></a></td>
                        <td><?php echo $book['tag'] ?>
                        <td><?php echo $book['user_name'] ?>
                        <td><a href="/app/backend/sites/book/book_delete.php?id=<?php echo $book['id']?>"><button  name="delete_one" class="btn btn-danger btn-xs">Delete</button></a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>Book Name</th>
                    <th>Tag</th>
                    <th>Owner</th>
                    <th>Edited</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>