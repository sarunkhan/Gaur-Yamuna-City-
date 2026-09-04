<?php
require __DIR__.'/../config/config.php';
if(is_admin()){header('Location: index.php');exit;}
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 check_csrf();
 $st=db()->prepare("SELECT * FROM admins WHERE email=? LIMIT 1"); $st->execute([trim($_POST['email']??'')]); $a=$st->fetch();
 if($a && password_verify($_POST['password']??'',$a['password_hash'])){
   $_SESSION['admin_id']=$a['id']; $_SESSION['admin_name']=$a['name']; header('Location:index.php'); exit;
 }
 $error='Invalid email or password.';
}
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>GBU Admin Login</title><link rel="stylesheet" href="admin.css"></head><body><div class="login"><div class="brand">GBU ADMIN</div><h1>Sign in</h1><p>Website Management Panel</p><?php if($error):?><div class="error"><?=e($error)?></div><?php endif;?><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf())?>"><label>Email</label><input type="email" name="email" required><label>Password</label><input type="password" name="password" required><button>Login</button></form><small>First login: admin@gbu.local / ChangeMe@123 — change it immediately.</small></div></body></html>