<?php ?>

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Catalog Manager</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" action="" method="post" >
                <div class="form-group">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="user_name" placeholder="New Category">
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
                    <tr>
                        <td><label>
                                <input type="checkbox" class="minimal">
                            </label></td>
                        <td>Internet Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> <button type="submit" name="delete_one" class="btn btn-danger btn-xs">Delete</button></td>
                    </tr>
                    <tr>
                        <td><label>
                                <input type="checkbox" class="minimal">
                            </label></td>
                        <td>Internet Explorer 5.0                           
                        </td>
                        <td>Win 95+</td>
                        <td><button type="submit" name="delete_one" class="btn btn-danger btn-xs">Delete</button></td>
                    </tr>
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