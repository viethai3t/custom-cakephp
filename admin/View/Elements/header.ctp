<div class="navbar navbar-default" role="navigation">
    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><span>Intellex</span></a>
        <?php if ($this->Session->check(Configure::read('acc_session'))): ?>
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                            <span class="hidden-sm hidden-xs">
                                <?php echo $this->Session->read(Configure::read('acc_session'))['name']; ?>
                            </span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>
