$(document).ready(function(){
	$(".namhoc").change(function(){
		var id_namhoc = $(".namhoc").val();
		$.post("/qlhs/libs/database_gv.php", {id :id_namhoc}, function(data){
			$(".view").html(data);
		})
	})
})