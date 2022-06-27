<div>
  <?php if(isset($_SESSION[_LOGINUSER])) {?>
    <a href="/board/write">Write</a>
    <a href="/user/logout">Logout</a>
  <?php } else {?>

  <?php } ?>
</div>