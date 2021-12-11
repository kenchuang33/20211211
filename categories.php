<?php
include "top.inc.php";
// include "function.inc.php";
$cat_id = mysqli_real_escape_string($conn, $_GET['cat_id']);
?>
<div class="marginauto">
<section class="newProducts">
    <div class="Indexrow">
        <?php
        $get_product = get_product($conn, '', $cat_id, '', '');
        if (count($get_product) > 0) {
            foreach ($get_product as $list) { ?>
            <div class="itemouter">
                <div class="Indexcol">
                    <div class="imgBx">
                        <img src="./admin/assets/images/<?php echo $list['pimage'] ?>">
                    </div>
                    
                </div>
                <div class="details">
                        <a href="products-detail.php?id=<?php echo $list['id'] ?>">
                            <h3><?php echo $list['pname'] ?></h3>
                            <p> $ <?php echo $list['sprice'] ?> </p>
                            <form action="add_cart.php" method="post">
                                <input type="hidden" name="pid" value="<?php echo $list['id'] ?>">
                                <!-- <input type="submit" name="cart" value="Add Cart" class="cartBtn"> -->
                            </form>
                        </a>
                    </div>
            </div>
        <?php }
        } else {
            echo "Product Not Found !";
        }
        ?>

    </div>
</section>
</div>
<?php
include "footer.inc.php";
?>