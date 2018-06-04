<?php
//print_r($_SESSION);
print_r($_GET['book_id']);
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
            <h3 class="box-title">Book: <?php echo $book['bookname'] ?> </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" action="/app/backend/sites/newword/word_add.php" method="post">
                <div class="form-group">
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="word" placeholder="new word ">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="mean" placeholder="mean">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="description" placeholder="description">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="image" placeholder="image URL">
                    </div>
                    <div class="col-sm-2" style="visibility: hidden">
                        <input type="text" name="book_id" value="<?php echo $_GET['book_id'] ?>">
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
                    <th>Words</th>
                    <th>Mean</th>
                    <th>Description</th>
                    <th>View image</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($row as $word) { ?>
                    <tr>
                        <td><label>
                                <input type="checkbox" class="minimal">
                            </label></td>
                        <td><input type="text" class="word_detail input_edit_inline" id="<?php echo $word['id'] ?>" name="mean"
                                   value="<?php echo $word['word'] ?>"
                                   readonly></td>
                        <td><input type="text" class="word_detail input_edit_inline" id="<?php echo $word['id'] ?>" name="mean"
                                   value="<?php echo $word['mean'] ?>"
                                   readonly></td>
                        <td><input type="text" class="word_detail input_edit_inline" id="<?php echo $word['id'] ?>" name="description"
                                   value="<?php echo $word['description'] ?>" readonly></td>
                        <td><input type="text" class="word_detail input_edit_inline" id="<?php echo $word['id'] ?>" name="image"
                                   value="<?php echo $word['image'] ?>"
                                   readonly></td>
                        <td>
                            <button name="edit" class="edit btn btn-danger btn-xs">Edit</button>
                            <a href="/app/backend/sites/newword/word_delete.php?id=<?php echo $word['id'] ?>">
                                <button name="delete_one" class="delete btn btn-danger btn-xs">Delete</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>Words</th>
                    <th>Mean</th>
                    <th>Description</th>
                    <th>View image</th>
                </tr>
                </tfoot>
            </table>
            <button class="test_ajax">test ajax</button>
            <h2 class="test_ajax_return1">2222</h2>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!--<script src="/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>-->
<script>
    $(document).ready(function () {
        $('.test_ajax').click(function (e) {
            e.preventDefault();
            $.post('/app/backend/sites/newword/word_detail.php', {
                word_id: 4
            }, function (result) {
                result = jQuery.parseJSON(result);
                console.log(result['word']);
                $('.test_ajax_return1').html(result['word']);
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.edit').click(function (event) {
            /* Act on the event */
            event.preventDefault();
//            console.log("aaa");
//            $(this).parent().parent().find("input").removeAttr('readonly');
            $(this).closest('tr').find("input").removeAttr('readonly');
            $(this).closest('tr').find("input").addClass('editing');

            var btnCancel = "<button name=\"cancel\" class=\"btn btn-danger btn-xs\" >Cancel</button>";
            $(this).parent().find(".delete").before(btnCancel);

            var btnSave = " <a href=\"/app/backend/sites/newword/word_edit.php?id="+<?php echo $word['id'] ?>+"\">\n" +
                "                                <button name=\"save\" class=\"btn btn-danger btn-xs\">Save</button>\n" +
                "                            </a>";
            $(this).parent().find(".delete").before(btnSave);


        });
    });
</script>