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
                        <td><input type="text" class="word_detail input_edit_inline" id="<?php echo $word['id'] ?>"
                                   name="mean"
                                   value="<?php echo $word['word'] ?>"
                                   readonly></td>
                        <td><input type="text" class="word_detail input_edit_inline" id="<?php echo $word['id'] ?>"
                                   name="mean"
                                   value="<?php echo $word['mean'] ?>"
                                   readonly></td>
                        <td><input type="text" class="word_detail input_edit_inline" id="<?php echo $word['id'] ?>"
                                   name="description"
                                   value="<?php echo $word['description'] ?>" readonly></td>
                        <td><input type="text" class="word_detail input_edit_inline" id="<?php echo $word['id'] ?>"
                                   name="image"
                                   value="<?php echo $word['image'] ?>"
                                   readonly></td>
                        <td class="btn">

                            <button name="edit" class="edit btn btn-success btn-xs" id="<?php echo $word['id'] ?>">Edit
                            </button>
                            <button style="display: none" name="cancel" class="cancel btn btn-primary btn-xs"
                                    id="<?php echo $word['id'] ?>">
                                Cancel
                            </button>
                            <a style="display: none" class="save"
                               href="/app/backend/sites/newword/word_edit.php?id=<?php echo $word['id'] ?>">
                                <button name="save" class="btnSave btn btn-success btn-xs">Save</button>
                            </a>
                            <a class="delete"
                               href="/app/backend/sites/newword/word_delete.php?id=<?php echo $word['id'] ?>">
                                <button name="delete_one" class="btnDelete btn btn-danger btn-xs">Delete</button>
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
            event.preventDefault();
            $(this).closest('tr').find("input").removeAttr('readonly');
            $(this).closest('tr').find("input").addClass('editing');

//            console.log($(this).parent().find('.cancel'));

            $(this).parent().find('.cancel').css("display","inline");
            $(this).parent().find('.save').css("display","inline");

            $(this).parent().find('.delete').css("display","none");
            $(this).css("display","none");
        });

        $('.cancel').click(function (event) {
            event.preventDefault();
            $(this).closest('tr').find("input").attr('readonly',true);
            $(this).closest('tr').find("input").removeClass('editing');

            $(this).parent().find('.edit').css("display","inline");
            $(this).parent().find('.delete').css("display","inline");

            $(this).parent().find('.save').css("display","none");
            $(this).css("display","none");
        });

        $('.save').click(function (e) {
            e.preventDefault();
            $.post('/app/backend/sites/newword/word_edit.php', {
                word_id: 4,
                word:  ,
                mean:  ,
                description:  ,
                image:
            }, function (result) {
                result = jQuery.parseJSON(result);
                console.log(result['word']);
                $('.test_ajax_return1').html(result['word']);
            });
        });
    });


</script>

<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('.edit').click(function (event) {-->
<!--            /* Act on the event */-->
<!--            event.preventDefault();-->
<!--//            console.log("aaa");-->
<!--//            $(this).parent().parent().find("input").removeAttr('readonly');-->
<!--            $(this).closest('tr').find("input").removeAttr('readonly');-->
<!--            $(this).closest('tr').find("input").addClass('editing');-->
<!---->
<!--            var word_id = $(this).attr("id");-->
<!---->
<!--            var btnCancel = '<button id=\"' + word_id + '\" name=\"cancel\" class=\"cancel btn btn-danger btn-xs\" >Cancel</button>';-->
<!--            $(this).parent().append(btnCancel);-->
<!---->
<!--            var btnSave = '<a href=\"/app/backend/sites/newword/word_edit.php?id=' + word_id + '\">' +-->
<!--                '<button name= \"save\" class=\"save btn btn-danger btn-xs\">Save</button>' +-->
<!--                '</a>';-->
<!--            $(this).parent().append(btnSave);-->
<!---->
<!--            $(this).parent().find(".btnDelete").remove();-->
<!--            $(this).remove();-->
<!--        });-->
<!---->
<!--        $('.btn').on('click', '.cancel', function (e2) {-->
<!--            e2.preventDefault();-->
<!--            console.log("click cancel");-->
<!---->
<!--            var word_id = $(this).attr("id");-->
<!---->
<!--            var btnEdit = '<button name="edit" class="edit btn btn-danger btn-xs" id="' + word_id + '">Edit</button>';-->
<!--            $(this).parent().append(btnEdit);-->
<!---->
<!--            var btnDelete = '<a class="btnDelete" href="/app/backend/sites/newword/word_delete.php?id="' + word_id + '">' +-->
<!--                '<button name="delete_one" class="delete btn btn-danger btn-xs">Delete</button>' +-->
<!--                '</a>';-->
<!--            $(this).parent().append(btnDelete);-->
<!---->
<!--            $(this).parent().find(".save").remove();-->
<!--            $(this).remove();-->
<!--// loi khong the click lai button edit lan thu 2-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->
