<header>
    <h1>タスク管理アプリ</h1>
    <?php if(isset($user)) { ?>
        <div id="modal-open">
        <img src="../assets/images/<?php echo htmlspecialchars($user['path'], ENT_QUOTES); ?>" width="48" height="48">
        <?php echo htmlspecialchars($user['name'], ENT_QUOTES); ?>
    </div>
    <div class="modal-body" id="modal-body" style=" display: none;">
        <a href="../auth/logout.php">ログアウト</p>
    </div>
    <?php } ?>
    
</header>

<script type="text/Javascript" src="../assets/js/header.js"></script>