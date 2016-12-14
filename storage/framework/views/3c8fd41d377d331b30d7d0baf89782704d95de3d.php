<!doctype html>
<html>
<head>
    <?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
<div class="container">

    <header class="row">
        <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </header>

    <div id="main" class="row">

        <!-- sidebar content -->
        <div id="sidebar" class="col-sm-0">
            <?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <!-- main content -->
        <div id="content" class="col-sm-2">
            <?php echo $__env->yieldContent('contenu'); ?>
        </div>

    </div>

    <footer class="row">
        <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </footer>

</div>
</body>
</html>