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

function likeProduct(id) {
  console.log(id);
  $.post("http://localhost/egifter/like", {
    id: id,
  });
  d = "#like-" + id;
  $(d).html(
    '<a href="javascript:unlikeProduct(' +
      id +
      ')" class="btn btn-danger "><i class="fas fa-heart-broken"></i></a>'
  );
}

function unlikeProduct(id) {
  console.log(id);
  $.post("http://localhost/egifter/unlike", {
    id: id,
  });
  d = "#like-" + id;
  $(d).html(
    '<a href="javascript:likeProduct(' +
      id +
      ')" class="btn btn-danger "><i class="fas fa-heart"></i></a>'
  );
}