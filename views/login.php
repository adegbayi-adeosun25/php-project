<?php
//--------------------------------
require_once 'home.html.twig';
//--------------------------------
?>

<form
    action="/?action=processLogin"
    method="post"
    >
    <form>
        <fieldset>
            <legend>Login Details</legend>
        username:<br>
        <input type="text" name="username"><br><br>



        password:<br>
        <input type="password" name="password"><br><br>
        </fieldset>
   </form>

    <input type="submit" value="login">

</form>

