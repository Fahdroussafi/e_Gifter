<?php
$user = new UsersController();
echo json_encode($user->like(intval($_POST['id'])));
  