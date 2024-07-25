<?php if( isset($alertas) && $alertas ): ?>
    <?php foreach( $alertas as $alerta ): ?>
        <div class="alert alert-<?php echo $alerta['type']; ?>" role="alert">
            <?php echo $alerta['msg']; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>