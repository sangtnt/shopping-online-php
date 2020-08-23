<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelmark</title>
    <link href="../img/logo.png" rel="icon">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="../fontawesome/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php
        require "../model/check_login_admin.php";
        require "../model/category.php";
        require "layout/menu.php";
        $result = findAllCategory();
    ?>
    <div class="container">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th colspan="2"><button type="button" class="addnew">Add new</button></th>
            </tr>
            <?php
                while($row = $result->fetch_assoc() ){
                    echo"
                        <tr>
                            <input class=\"id\" type=\"hidden\" value=\"".$row['id']."\">
                            <td class=\"namePro\">".$row['name']."</td>
                            <td class=\"imgPro\"><img src=\"../".$row['image']."\" height=\"100px\" width=\"100px\"></td>
                            <td><button class=\"editpro\" type=\"button\">Edit</button></td>
                            <td><a href=\"../model/deleteCategory.php?catId=".$row["id"]."\">
                            <button type='button' onclick=\"return confirm('If you delete this category, all products and orders belong to it will be also deleted! Are you sure?')\" type=\"button\">Delete</button>
                            </a></td>
                        </tr>
                    ";
                }
            ?>
        </table>
        <div class="form-data">
            <div class="handler-form add">
                <form method="post" action="../model/addCategory.php" enctype="multipart/form-data">
                    <table>
                        <caption>
                            <h3>Add new</h3>
                        </caption>
                        <tr>
                            <th>Name:</th>
                            <td><input name="name" type="text"></td>
                        </tr>
                        <tr>
                            <th>Image:</th>
                            <td><input name="file" id="addfile" type="file"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><img id="addImg" height="100px" width="100px" src="../img/no_image.jpg"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit">Submit</button>
                                <button type="button" class="close">Close</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="handler-form edit">
                <form method="post" action="../model/editCategory.php" enctype="multipart/form-data">
                    <table>
                        <caption>
                            <h3>Edit</h3>
                        </caption>
                        <input name="id" id="idPro" type="hidden">
                        <tr>
                            <th>Name:</th>
                            <td><input name="name" id="namePro" type="text"></td>
                        </tr>
                        <tr>
                            <th>Image:</th>
                            <td><input name="file" id="editfile" type="file"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><img id="editImg" height="100px" width="100px" src="../img/image-asset.jpeg"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit">Submit</button>
                                <button type="button" class="close">Close</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/admin.js"></script>
    <script>
    $(".editpro").click(function() {
        $(".add").hide();
        $(".edit").show();
        father = $(this).parent("td").parent("tr");
        $("#idPro").val(father.find(".id").val());
        $("#namePro").val(father.find(".namePro").text());
        $("#editImg").attr("src", father.find(".imgPro").find('img').attr('src'));
    })
    </script>
</body>

</html>