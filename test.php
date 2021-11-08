<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="ie=edge">
    <title>shopping cart</title>

    <link rel="stylesheet" href="style12.css">
</head>
<body>
    <div id="shopping-cart">
        <div class="txt-heading">shopping cart</div>
        <a href="#" id="btnempty">empty cart</a>

        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
                <tr>
                    <th style="text-align: left;">name</th>
                    <th style="text-align: left;">code</th>
                    <th style="text-align: right;" width="5%">quantity</th>
                    <th style="text-align: right;" width="10%">unit price</th>
                    <th style="text-align: right;" width="10%">price</th>
                    <th style="text-align: center;" width="5%">remove</th>
                </tr>

                <tr>
                    <td><img src="images/cpu.png" width="200" class="cart-item" alt=""></td>
                    <td>Dfcd13D</td>
                    <td style="text-align: right;">1</td>
                    <td style="text-align: right;">$1000</td>
                    <td style="text-align: right;">$1000</td>
                    <td style="text-align: center;"><a href="#" class="btnRemoveAction"><img src="images/icon-delete.png" width="200" alt="remove item"></td>
                </tr>

                <tr>
                    <td colspan="2" align="right">total :</td>
                    <td align="right">1</td>
                    <td align="right" colspan="2">$1000.00</td>
                    <td></td>
                </tr>


            </tbody>
        </table>
    </div>

    <div id="product-grid">
        <div class="txt-heading">products</div>

        <div class="product-item">
            <form action="index_.php?action=add&code">
                <div class="product-image">
                    <img src="images/mainboard.png" width="150" alt="images">
                </div>
                <div class="product-title-footer">
                    <div class="product-title">mainboard</div>
                    <div class="product-price">$1000</div>
                    <div class="cart-action">
                        <input type="text" class="product-quanlity" name="quanlity" value="1" size="2">
                        <input type="submit" value="add to cart" class="btnAddAction">
                    </div>
                </div>  
            </form>
        </div>
    </div>

</body>
</html>