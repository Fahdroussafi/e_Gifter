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
  // use localStorage to store the id of the product
  // localStorage.setItem("product_id", $id);
}

function deleteForm($id) {
  const input = document.querySelector("#delete_product_id");
  const form = document.querySelector("#delete_form");
  input.value = $id;
  form.submit();
}

var userBasket=[];


// effacer le panier :
function clearBasket(){
	userBasket=[];
	localStorage.setItem('basket',JSON.stringify(userBasket));
	(document.querySelector("#basket-top")).innerHTML=(getBasketItemsCount());
	(document.querySelector("#commande")).innerHTML="";
}


// somme de quantité des éléments dans le panier :
function getBasketItemsCount(){
	var total=0;
	for(i=0;i<userBasket.length;i++){
		total+= parseFloat(userBasket[i].qte);
		// total++; 

	}
	return total;
}



// ajout d'un produit dans le panier :
function addToBasket(el,qte=1){ // el : l'élément cliqué 
	 
	var id_prod=el.getAttribute('data-prod-id'); // récupération de l'id du produit
	var nom_prod=el.getAttribute('data-prod-nom'); // récupération du nom du produit
	var prix_prod=el.getAttribute('data-prod-prix');
	var image_prod=el.getAttribute('data-prod-image');
	var max_qte=el.getAttribute('data-prod-maxqte');
	

	var exist=false; // return false si le produit n'existe pas dans le panier 
	for(i=0;i<userBasket.length;i++){ // parcours du panier

		if(userBasket[i].id===id_prod){  // si le produit existe déjà dans le panier
			exist=true;   		//  le produit existe déja dans le panier on modifie juste la quantité 
			if((parseFloat(userBasket[i].qte)+parseFloat(qte))<=parseFloat(max_qte)){ // si la quantité est inférieur ou égale à la quantité max du produit
				setBasketItemQuantity(i,parseFloat(userBasket[i].qte)+parseFloat(qte)); // on modifie la quantité dans le panier
			} // end if
		}
	}
	// nouvelle insertion du produit dans le panier (produit n'existe pas ) 
	if(!exist){  
	userBasket.push({id:id_prod,nom:nom_prod,prix:prix_prod,img:image_prod,qte:parseFloat(qte),maxqte:max_qte}); 
	localStorage.setItem('basket',JSON.stringify(userBasket)); // re enregistrement dans localstorage 
    }
    (document.querySelector("#basket-top")).innerHTML=(getBasketItemsCount());

}
