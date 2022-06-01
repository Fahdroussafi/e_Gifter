function getCatProducts($id) {
  const input = document.querySelector("#cat_id");
  const form = document.querySelector("#catPro");
  input.value = $id;
  form.submit();
}

function submitForm($id) {
  const input = document.querySelector("#product_id");
  const form = document.querySelector("#form");
  input.value = $id;
  form.submit();
}

function deleteForm($id) {
  const input = document.querySelector("#delete_product_id");
  const form = document.querySelector("#delete_form");
  input.value = $id;
  form.submit();
}

// ajouter un produit au favori :
function likeProduct(id){
	$.ajax({ // requete ajax
		url: "http://localhost/eGifter/user/like/"+id,
	  }) 
	.done(function( data ) {
		var res=JSON.parse(data);
		if(res.status=="OK"){
			var d="#like-"+id;
			$(d).html('<a href="javascript:unlikeProduct('+id+')" class="btn heart"><i class="fas fa-heart-broken"></i></a>') // changement du bouton
		} // end if
		else{
			alert(res.message);
		}
	});
}


// retirer un produit au favori  :
function unlikeProduct(id){
	$.ajax({
		url: "http://localhost/eGifter/user/unlike/"+id,
	  })
	.done(function( data ) {
		var res=JSON.parse(data);
		if(res.status=="OK"){
			d="#like-"+id;
			$(d).html('<a href="javascript:likeProduct('+id+')" class="btn heart"><i class="fas fa-heart"></i></a>')
		}
		else{
			alert(res.message);
		}
	});
}