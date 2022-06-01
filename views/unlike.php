<?php
$user = new UsersController();
echo json_encode($user->unlike(intval($_POST['id'])));