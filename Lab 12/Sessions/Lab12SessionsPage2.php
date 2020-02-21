<html> 
<head> 
<title> 
Lab 12 Task 1 Sessions 
</title>
<link href="Lab12Sessions.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>Lab 12 Task 1 Shopping Cart using Sessions </h1> 
<div class="clear-float"></div>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');"><img src="images/icon-empty.png" /> Empty Cart</a></div>
<div id="cart-item">
<?php 

session_start(); 
if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
		    $productByCode = $productArray[$_POST["code"]];
		    $itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
			    $cartCodeArray = array_keys($_SESSION["cart_item"]);
			    if(in_array($productByCode["code"],$cartCodeArray)) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["code"] == $k) {
							    $_SESSION["cart_item"][$k]["quantity"] = $_SESSION["cart_item"][$k]["quantity"]+$_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;		
}
}
if(isset($_SESSION["cart_item"])){
    $item_total = 0;  
	


?>

<table class="tutorial-table">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th class="align-right"><strong>Quantity</strong></th>
<th class="align-right"><strong>Price</strong></th>
<th></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["code"]; ?></td>
				<td align="right"><?php echo $item["quantity"]; ?></td>
				<td align="right"><?php echo $item["price"]; ?></td>
				<td align="center"><a onClick="cartAction('remove','<?php echo $item["code"]; ?>')" class="btnRemoveAction cart-action"><img src="images/icon-delete.png" /></a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="3" align=right><strong>Total:</strong></td>
<td align=right><?php echo number_format($item_total,2); ?></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
}
?>



</div>
</div> 
<form action="Lab12Sessions .php">
    <input type="submit" value="Back to Shopping " />
</form>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function cartAction(action, product_code) {
    var queryString = "";
    if (action != "") {
        switch (action) {
        case "add":
            queryString = 'action=' + action + '&code=' + product_code
                    + '&quantity=' + $("#qty_" + product_code).val();
            break;
        case "remove":
            queryString = 'action=' + action + '&code=' + product_code;
            break;
        case "empty":
            queryString = 'action=' + action;
            break;
        }
    }
    jQuery.ajax({
        url : "ajax-action.php",
        data : queryString,
        type : "POST",
        success : function(data) {
            $("#cart-item").html(data);
            if (action == "add") {
                $("#add_" + product_code + " img").attr("src",
                        "images/icon-check.png");
                $("#add_" + product_code).attr("onclick", "");
            }
        },
        error : function() {
        }
    });
}
</script>
</body>  
</html> 
