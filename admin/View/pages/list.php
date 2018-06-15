<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <h3>Pages <a href="/admin/pages/create/">Create page</a> </h3>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pages as $page): ?>
                <tr>
                    <th scope="row">1</th>
                    <td><a href="/admin/pages/edit/<?=$page['id']?>">
                        <?=$page['title']?></a></td>
                    <td><?=$page['content']?></td>
                    <td><?=$page['date']?></td>
                </tr>
    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </main>

<?php $this->theme->footer(); ?>