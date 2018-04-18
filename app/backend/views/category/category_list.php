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
            <h3 class="box-title">Catalog Manager</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" action="/app/backend/sites/category/category_add.php" method="post" >
                <div class="form-group">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="category_title" placeholder="New Category">
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
                        <th>Category Name</th>
                        <th>Alias</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $catelogy) { ?>
                        <tr>
                            <td><label>
                                    <input type="checkbox" class="minimal">
                                </label></td>
                            <td><?php echo $catelogy['title'] ?>
                            </td>
                            <td><?php echo $catelogy['alias'] ?></td>
                            <td> <button type="submit" name="delete_one" class="btn btn-danger btn-xs">Delete</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Category Name</th>
                        <th>Alias</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>