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
        require "layout/menu.php";
        require "../model/product.php";
        require "../model/category.php";
        $result = findAllPro();
    ?>
    <div class="container">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th colspan="3"><button type="button" class="addnew">Add new</button></th>
            </tr>
            <?php
                while ($row = $result->fetch_assoc()){
                    if ($row["status"]){
                        $btn = "<td><a href=\"../model/deactivate.php?proId=".$row["id"]."\"><button type=\"button\">Deactivate</button></a></td>";
                    }
                    else{
                        $btn = "<td><a href=\"../model/activate.php?proId=".$row["id"]."\"><button type=\"button\">Activate</button></a></td>";
                    }
                    echo"
                        <tr>
                            <input class=\"id\" type=\"hidden\" value=\"".$row["id"]."\">
                            <input class=\"catId\" type=\"hidden\" value=\"".$row["cat_id"]."\">
                            <td class=\"proName\">".$row["name"]."</td>
                            <td class=\"proImg\"><img src=\"../".$row["image"]."\" height=\"100px\" width=\"100px\"></td>
                            <td class=\"proPrice\">".number_format($row["price"],0,",",".")."đ</td>
                            <td class=\"proDes\">".$row["description"]."</td>
                            <td class=\"proQty\">".number_format($row["quantity"],0,",",".")."</td>
                            <td class=\"proDis\">".$row["discount"]."%</td>
                            <td><button class=\"editpro\" type=\"button\">Edit</button></td>
                            <td>
                                <a href=\"../model/delete_product.php?proId=".$row["id"]."\">
                                <button type='button' onclick=\"return confirm('If you delete this product, all orders belong to it will be also deleted! Are you sure?')\" type=\"button\">Delete</button>
                                </a>
                            </td>
                            $btn
                        </tr>
                    ";
                }
            ?>
        </table>
        <div class="form-data">
            <div class="handler-form add">
                <form method="post" action="../model/addProduct.php" enctype="multipart/form-data">
                    <table>
                        <caption>
                            <h3>Add new</h3>
                        </caption>
                        <tr>
                            <th>Name:</th>
                            <td><input name="name" type="text"></td>
                        </tr>
                        <tr>
                            <th>Price:</th>
                            <td><input name="price" type="number"></td>
                        </tr>
                        <tr>
                            <th>Quantity:</th>
                            <td>
                                <input name="qty" type="number">
                            </td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>
                                <textarea name="des"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Discount:</th>
                            <td>
                                <select name="dis">
                                    <?php
                                        for ($i=0; $i<=100; $i++){
                                            echo "<option value=\"$i\">$i%</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Category:</th>
                            <td>
                                <select name="cat">
                                    <?php
                                        $cats = findAllCategory();
                                        while($row = $cats->fetch_assoc()){
                                            echo "<option value=\"".$row["id"]."\">".$row["name"]."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
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
                                <button type="reset" class="close">Close</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="handler-form edit">
                <form method="post" action="../model/editProduct.php" enctype="multipart/form-data">
                <table>
                        <caption>
                            <h3>Edit</h3>
                        </caption>
                        <input name="id" type="hidden" id="proId">
                        <tr>
                            <th>Name:</th>
                            <td><input name="name" id="proName" type="text"></td>
                        </tr>
                        <tr>
                            <th>Price:</th>
                            <td><input name="price" id="proPrice" type="number"></td>
                        </tr>
                        <tr>
                            <th>Quantity:</th>
                            <td>
                                <input name="qty" id=proQty type="number">
                            </td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>
                                <textarea name="des" id="proDes"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Discount:</th>
                            <td>
                                <select name="dis" id="proDis">
                                    <?php
                                        for ($i=0; $i<=100; $i++){
                                            echo "<option value='$i'>$i%</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Category:</th>
                            <td>
                                <select name="cat" id="cat">
                                    <?php
                                        $cats = findAllCategory();
                                        while($row = $cats->fetch_assoc()){
                                            echo "<option value=\"".$row["id"]."\">".$row["name"]."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
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
                                <button type="reset" class="close">Close</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/admin.js"></script>
    <script>  
        $(".editpro").click(function(){
            $(".add").hide();
            $(".edit").show();
            father = $(this).parent("td").parent("tr");
            $("#proId").val(father.find(".id").val());
            $("#proName").val(father.find(".proName").text());
            $("#cat").val(father.find(".catId").val());
            $("#proPrice").val(parseInt(father.find(".proPrice").text().replace(/\./g,"")));
            $("#proQty").val(parseInt(father.find(".proQty").text().replace(/\./g,"")));
            $("#proDes").val(father.find(".proDes").text());
            $("#proDis").val(parseInt(father.find(".proDis").text().replace("%","")));
            $("#editImg").attr("src", father.find(".proImg").find('img').attr('src'));
        })
    </script>
</body>

</html>