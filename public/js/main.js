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

function deleteFormCat($id) {
  const input = document.querySelector("#delete_cat_id");
  const form = document.querySelector("#delete_form_cat");
  input.value = $id;
  form.submit();
}

function submitFormCat ($id){
  const input = document.querySelector("#update_category_id");
  const form = document.querySelector("#update");
  input.value = $id;
  form.submit();
}