<?php include_once 'header.php'; ?>
<body >
    <div class="container ml-1 px-2 p-3 mb-3 border" style="margin-top: 70px;">
        <?php $this->loadViewIntemplate($viewName, $viewData); ?>
    </div>
    
</body>
<script src="<?= BASE_URL ?>/js/scripts.js" type="text/javascript"></script>
</html>