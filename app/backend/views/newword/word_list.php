<?php
//print_r($_SESSION);
//print_r($_GET['book_id']);
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
                    <div class="col-sm-2" style="display: none">
                        <input type="text" name="book_id" value="<?php echo $_GET['book_id'] ?>">
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-info pull-left btn-sm">Add</button>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" id="btnimport" name="import" class="btn btn-info pull-right btn-sm" data-toggle="modal"
                                data-target="#import">Import
                        </button>
                    </div>
                </div>
            </form>
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Words<span class="fa fa-sort no-sort table-sort" id="cl1" name="word"></span></th>
                    <th>Mean<span class="fa fa-sort-up yes-sort table-sort" id="cl2" name="mean"></th>
                    <th>Description<span class="fa fa-sort-down yes-sort table-sort" id="cl3" name="description"></th>
                    <th>View image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($row as $word) { ?>
                    <tr>
                        <td><label>
                                <input type="checkbox" class="minimal">
                            </label></td>
                        <td><input type="text" class="word input_edit_inline"
                                   name="word"
                                   value="<?php echo $word['word'] ?>"
                                   readonly></td>
                        <td><input type="text" class="mean input_edit_inline"
                                   name="mean"
                                   value="<?php echo $word['mean'] ?>"
                                   readonly></td>
                        <td><input type="text" class="description input_edit_inline"
                                   name="description"
                                   value="<?php echo $word['description'] ?>" readonly></td>
                        <td><input type="text" class="image input_edit_inline"
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
                            <button style="display: none" name="save" class="save btn btn-success btn-xs"
                                    id="<?php echo $word['id'] ?>">
                                Save
                            </button>
                            <!--                            <a class="delete"-->
                            <!--                               href="/app/backend/sites/newword/word_delete.php?id=-->
                            <?php //echo $word['id'] ?><!--&book_id=--><?php //echo $_GET['book_id'] ?><!--">-->
                            <!--                                <button name="delete_one" class="btnDelete btn btn-danger btn-xs">Delete</button>-->
                            <!--                            </a>-->
                            <button type="button" class="btnDelete btn btn-danger btn-xs delete-btn2"
                                    data-toggle="modal"
                                    data-target="#modal-default" word="<?php echo $word['word'] ?>"
                                    word_id="<?php echo $word['id'] ?>" book_id="<?php echo $_GET['book_id'] ?>">
                                Delete
                            </button>
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
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
            <div class="dataTables_paginate">
                <?php
                pager_function($totalPages, $currentPage, $link);
                ?>
            </div>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete a word</h4>
                        </div>
                        <div class="modal-body">
                            <p class="delete-popup-text">Do you want to delete word</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                            <a class="del-yes-btn">
                                <button name="delete_one" class="btn btn-primary">Yes</button>
                            </a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal fade" id="import">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Import excel file</h4>
                        </div>
                        <form action="/app/backend/sites/newword/word_import_excel.php" method="post"
                              enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="file" name="file">
                                <p class="text-warning" style="display: none;color: red">Import excel file unsuccessful</p>
                            </div>

                            <div class="col-sm-2" style="display: none">
                                <input type="text" name="book_id" value="<?php echo $_GET['book_id'] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel
                                </button>
                                <a>
                                    <button type="submit" name="btnImport" class="btn btn-primary">Import</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<script>
    $(document).ready(function () {
        //Lấy parametter GET (URL) bằng JS
        let searchParams = new URLSearchParams(window.location.search);
        let sortby = searchParams.get('sort-by');
        let sorttype = searchParams.get('sort-type');
        let book_id = searchParams.get('book_id');
        let import_err = searchParams.has('import_err'); // check xem co param 'import_err' hay khong, return true/false
//        console.log(import_err);

        $('.table-sort').each(function (index, element) {
            if ($(element).attr('name') == sortby) {
                if (sorttype == 'DESC') {
                    $(element).removeClass().addClass('fa fa-sort-up yes-sort table-sort');
                } else {
                    $(element).removeClass().addClass('fa fa-sort-down yes-sort table-sort');
                }
            } else {
                $(element).removeClass().addClass('fa fa-sort no-sort table-sort');
            }

        });

        $('.edit').click(function (event) {
            event.preventDefault();
            $(this).closest('tr').find("input").removeAttr('readonly');
            $(this).closest('tr').find("input").addClass('editing');

            $(this).parent().find('.cancel').css("display", "inline");
            $(this).parent().find('.save').css("display", "inline");

            $(this).parent().find('.delete').css("display", "none");
            $(this).css("display", "none");
        });

        $('.cancel').click(function (event) {
            event.preventDefault();
            $(this).closest('tr').find("input").attr('readonly', true);
            $(this).closest('tr').find("input").removeClass('editing');

            $(this).parent().find('.edit').css("display", "inline");
            $(this).parent().find('.delete').css("display", "inline");

            $(this).parent().find('.save').css("display", "none");
            $(this).css("display", "none");
        });

        $('.save').click(function (e) {
            e.preventDefault();
            $(this).closest('tr').find("input").attr('readonly', true);
            $(this).closest('tr').find("input").removeClass('editing');

            $(this).parent().find('.edit').css("display", "inline");
            $(this).parent().find('.delete').css("display", "inline");

            $(this).parent().find('.cancel').css("display", "none");
            $(this).css("display", "none");
            var this1 = $(this); // TRUYEN bien this vao function khac


            $.post('/app/backend/sites/newword/word_edit.php', {
                word_id: $(this).attr("id"),
                word: $(this).closest('tr').find(".word").val(),
                mean: $(this).closest('tr').find(".mean").val(),
                description: $(this).closest('tr').find(".description").val(),
                image: $(this).closest('tr').find(".image").val()
            }, function (result) {
                var result_array = jQuery.parseJSON(result);
                console.log(result_array);
                console.log(this1.closest('tr').find('.word').val());
                this1.closest('tr').find(".word").val(result_array['word']);
                this1.closest('tr').find("input .mean").val(result_array['mean']);
                this1.closest('tr').find("input .description").val(result_array['description']);
                this1.closest('tr').find("input .image").val(result_array['image']);
            });

        });

        $('.fa').click(function (event) {
            event.preventDefault();

            if ($(this).hasClass('no-sort')) {
                $(this).removeClass('no-sort');
                $(this).removeClass('fa-sort');
                $(this).addClass('fa-sort-down');
                $(this).addClass('yes-sort');
                location.href = '?m=newword&a=word_list&book_id=' + book_id + '&sort-by=' + $(this).attr('name') + '&sort-type=ASC';
            } else {
                if ($(this).hasClass('fa-sort-down')) {
                    $(this).removeClass('fa-sort-down');
                    $(this).addClass('fa-sort-up');
                    location.href = '?m=newword&a=word_list&book_id=' + book_id + '&sort-by=' + $(this).attr('name') + '&sort-type=DESC';
                } else {
                    $(this).removeClass('fa-sort-up');
                    $(this).addClass('fa-sort-down');
                    location.href = '?m=newword&a=word_list&book_id=' + book_id + '&sort-by=' + $(this).attr('name') + '&sort-type=ASC';
                }
            }
            var this_id = $(this).attr('id');
            $('.table-sort').not('#' + this_id).removeClass().addClass('fa fa-sort no-sort table-sort');
        });

        $('.delete-btn2').click(function (event) {
            event.preventDefault();
            var word = $(this).attr('word');
            var word_id = $(this).attr('word_id');
            var book_id = $(this).attr('book_id');
            $('.delete-popup-text').html('Do you want to delete word:   ' + word);
            $('.del-yes-btn').attr("href", "/app/backend/sites/newword/word_delete.php?id=" + word_id + "&book_id=" + book_id);
        });

        $('.image').click(function (event) {
            event.preventDefault();
            var window_image;
            var str = $(this).val();
            console.log(str);
            if (!$(this).hasClass('editing')) {
                if (str.includes("http", 0)) {  //Nếu trong chuỗi có http ở đầu
                    window_image = window.open($(this).val(), "myWindow", "width=400,height=400,top=200,left=200");
                }
            }
        })

        if (import_err) {
            //ham tu dong click button
            jQuery(function () {
                jQuery('#btnimport').click();
            });
            $('.text-warning').css('display','block');

        }

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
