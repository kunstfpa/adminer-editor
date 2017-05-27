<?php
function adminer_object() {

  class AdminerSoftware extends Adminer {

    function credentials() {
      return array($_GET['server'], $_GET['username'], get_password());
    }
    function database() {
      // database name, will be escaped by Adminer
      return $_GET['db'];
    }
        function loginForm() {
                ?>
<table cellspacing="0">
<tr><th><?php echo lang('Server'); ?><td><input name="auth[server]" id="username" value="<?php echo h($_GET["server"]); ?>" autocapitalize="off">
<tr><th><?php echo lang('Database'); ?><td><input name="auth[db]" id="username" value="<?php echo h($_GET["db"]); ?>" autocapitalize="off">
<tr><th><?php echo lang('Username'); ?><td><input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="<?php echo h($_GET["username"]); ?>" autocapitalize="off">
<tr><th><?php echo lang('Password'); ?><td><input type="password" name="auth[password]">
</table>
<script type="text/javascript">
focus(document.getElementById('username'));
</script>
<?php
                echo "<p><input type='submit' value='" . lang('Login') . "'>\n";
                echo checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang('Permanent login')) . "\n";
        }

  }

  return new AdminerSoftware;
}

include "./editor.php";
