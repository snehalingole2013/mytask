<?php  include("../template/header.php"); ?>

<div class="container">
	<button id="inc" class="btn btn-primary">+</button>
	<input type="text" id="pr_items" name="" value="1">
	<button id="dec" class="btn btn-primary">-</button>

</div>
<div class="container">
	<div class="row">
		<?php 
			//Dbconn object is not useful, beacuse it contains only connection 
			//creating object of Report_model class because it will contain all required methods

			$cart_model = new Cart_model(); 
			$categry = $cart_model->getCatagories(); 

			foreach ($categry as $val){ ?>
				<div class="col">
				  	
					<label><input type='radio' class="product_cat" name='prod_cat' value="<?php echo $val['id']?>"> <?php echo $val['category'] ?></label>
				</div>
		<?php } ?>
	</div>
		
	<div class="row" id="product_list">
		
	</div>
	<p id="error_msg" style="color:red"></p>

</div>

<script type="text/javascript">
	$(document).ready(function(){

		$("#inc").click(function(){
			//read value from input
			// when integer value as a string then use parseint. it is the conversion of string to int value.
			var n = parseInt($("#pr_items").val());
			if(n>=1){
				//write value in that input
				$("#pr_items").val(n+1);
			}
		});

		$("#dec").click(function(){
			var n = $("#pr_items").val();
			if(n>1){
				$("#pr_items").val(n-1);
			}
		});

		$(".product_cat").click(function(){
			var cat_id = $(this).val();
		
			$.ajax({
				url:"<?php echo PROJECT_URL ?>/cart/getproduct.php",
				data:{"cat": cat_id},
				type:"POST",
				dataType:"json",
				success: function(res){
					console.log(res);
					if(res.status=='success'){
						html_str = "";
						if(res.data.length>0){

							$.each(res.data,function(key, value){
								html_str +='<div class="col-4">\
									<p><b>'+value.name+'</b></p>\
									<p><b>Price</b> : '+value.price+'</p>\
									<hr>\
								</div>'; 
							});
						}else{
							html_str ="No products found!!";
						}
						$("#product_list").html(html_str);	
					}
					else{
						$("#error_msg").html(res.message);
					}
				}//success close

			})

		})

})


</script>