<div>
    <a href="<?php echo ROOT_PATH; ?>posts/add">Add Post</a>
    <ul class="list-group">
        <?php foreach($viewmodel as $item) : ?>
            <li class="list-group-item">
                <h4><?php echo $item['title']; ?></h4>
                <small><i><?php echo $item['create_date']; ?></i></small>
                <p><?php echo $item['body']; ?></p>
                <a href="<?php echo $item['link']; ?>" class="btn btn-outline-secondary">
                    Visit Link
                </a>
                <p><strong><?php echo $item['link']; ?></strong></p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>