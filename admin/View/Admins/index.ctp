<?php
    $this->extend('')
?>

<div class="row">
    <div class="col-md-12 center login-header">
        <h2>Intellex</h2>
    </div>
    <!--/span-->
</div><!--/row-->

<div class="row">
    <div class="well col-md-5 center login-box">
        <form class="form-horizontal" action="login" method="post">
            <fieldset>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                    <input type="text" class="form-control" placeholder="ID" name="email">
                </div>
                <div class="clearfix"></div><br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                    <input type="password" class="form-control" name="Password">
                </div>
                <div class="clearfix"></div>
                <p class="center col-md-5">
                    <button type="submit" class="btn btn-primary">ログイン</button>
                </p>
            </fieldset>
        </form>
    </div>
    <!--/span-->
</div><!--/row-->
