<!-- Start messages -->
<li class="dropdown navbar-message">

    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i><span class="count label label-danger rounded">7</span></a>

    <!-- Start dropdown menu -->
    <div class="dropdown-menu animated bounceInDown">
        <div class="dropdown-header">
            <span class="title">Messages <strong>(7)</strong></span>
            <span class="option text-right"><a href="#">+ New message</a></span>
        </div>
        <div class="dropdown-body">

            <!-- Start message search -->
            <form class="form-horizontal" action="#">
                <div class="form-group has-feedback has-feedback-sm m-5">
                    <input type="text" class="form-control input-sm" placeholder="Search message...">
                    <button type="submit" class="btn btn-theme fa fa-search form-control-feedback"></button>
                </div>
            </form>
            <!--/ End message search -->

            <!-- Start message list -->
            <div class="media-list niceScroll">

                <a href="<?= Yii::$app->getUrlManager()->createUrl('admin/page/messages') ?>" class="media">
                    <div class="pull-left"><img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" class="media-object img-circle" alt="John Kribo"/></div>
                    <div class="media-body">
                        <span class="media-heading">John Kribo</span>
                        <span class="media-text">I was impressed how fast the content is loaded. Congratulations. nice design.</span>
                        <!-- Start meta icon -->
                        <span class="media-meta"><i class="fa fa-reply"></i></span>
                        <span class="media-meta"><i class="fa fa-paperclip"></i></span>
                        <span class="media-meta pull-right">13 minutes</span>
                        <!--/ End meta icon -->
                    </div><!-- /.media-body -->
                </a><!-- /.media -->

                <a href="<?= Yii::$app->getUrlManager()->createUrl('admin/page/messages') ?>" class="media">
                    <div class="pull-left"><img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" class="media-object img-circle" alt="Jennifer Poiyem"/></div>
                    <div class="media-body">
                        <span class="media-heading">Jennifer Poiyem</span>
                        <span class="media-text">It’s Simple, Clean & Nice .. Good work Dear .. GLWS</span>
                        <!-- Start meta icon -->
                        <span class="media-meta pull-right">17 hours</span>
                        <!--/ End meta icon -->
                    </div><!-- /.media-body -->
                </a><!-- /.media -->

                <a href="<?= Yii::$app->getUrlManager()->createUrl('admin/page/messages') ?>" class="media">
                    <div class="pull-left"><img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" class="media-object img-circle" alt="Clara Wati"/></div>
                    <div class="media-body">
                        <span class="media-heading">Clara Wati</span>
                        <span class="media-text">Great work! Do you have any plans to add loading indicators for AJAX calls that might take longer than normal?</span>
                        <!-- Start meta icon -->
                        <span class="media-meta pull-right">1 days</span>
                        <!--/ End meta icon -->
                    </div><!-- /.media-body -->
                </a><!-- /.media -->

                <a href="<?= Yii::$app->getUrlManager()->createUrl('admin/page/messages') ?>" class="media">
                    <div class="pull-left"><img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" class="media-object img-circle" alt="Toni Mriang"/></div>
                    <div class="media-body">
                        <span class="media-heading">Toni Mriang</span>
                        <span class="media-text">I am very interested in the theme and I’m thinking about buying it.</span>
                        <!-- Start meta icon -->
                        <span class="media-meta"><i class="fa fa-paperclip"></i></span>
                        <span class="media-meta pull-right">2 days</span>
                        <!--/ End meta icon -->
                    </div><!-- /.media-body -->
                </a><!-- /.media -->

                <a href="<?= Yii::$app->getUrlManager()->createUrl('admin/page/messages') ?>" class="media">
                    <div class="pull-left"><img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" class="media-object img-circle" alt="Bella negoro"/></div>
                    <div class="media-body">
                        <span class="media-heading">Bella negoro</span>
                        <span class="media-text">Great work! Good luck!</span>
                        <!-- Start meta icon -->
                        <span class="media-meta"><i class="fa fa-paperclip"></i></span>
                        <span class="media-meta"><i class="fa fa-user"></i></span>
                        <span class="media-meta pull-right">1 week</span>
                        <!--/ End meta icon -->
                    </div><!-- /.media-body -->
                </a><!-- /.media -->

                <a href="<?= Yii::$app->getUrlManager()->createUrl('admin/page/messages') ?>" class="media">
                    <div class="pull-left"><img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" class="media-object img-circle" alt="Kim Mbako"/></div>
                    <div class="media-body">
                        <span class="media-heading">Kim Mbako</span>
                        <span class="media-text">Hi! First of all, thank you for the very nice theme for creating awesome web applications :)</span>
                        <!-- Start meta icon -->
                        <span class="media-meta"><i class="fa fa-paperclip"></i></span>
                        <span class="media-meta pull-right">1 week</span>
                        <!--/ End meta icon -->
                    </div><!-- /.media-body -->
                </a><!-- /.media -->

                <a href="<?= Yii::$app->getUrlManager()->createUrl('admin/page/messages') ?>" class="media">
                    <div class="pull-left"><img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" class="media-object img-circle" alt="Pack Suparman"/></div>
                    <div class="media-body">
                        <span class="media-heading">Pack Suparman</span>
                        <span class="media-text">Apik temen kie jan template, nyong gep tuku jal..</span>
                        <!-- Start meta icon -->
                        <span class="media-meta pull-right">1 week</span>
                        <!--/ End meta icon -->
                    </div><!-- /.media-body -->
                </a><!-- /.media -->

                <!-- Start message indicator -->
                <a href="#" class="media indicator inline">
                    <span class="spinner">Load more messages...</span>
                </a>
                <!--/ End message indicator -->

            </div>
            <!--/ End message list -->

        </div>
        <div class="dropdown-footer">
            <a href="<?= Yii::$app->getUrlManager()->createUrl('admin/page/messages') ?>">See All</a>
        </div>
    </div>
    <!--/ End dropdown menu -->

</li><!-- /.dropdown navbar-message -->
<!--/ End messages -->