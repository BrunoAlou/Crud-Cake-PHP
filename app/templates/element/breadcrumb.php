<?php if (isset($breadcrumbs) && is_array($breadcrumbs)): ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb px-5 py-2">
            <?php
            foreach ($breadcrumbs as $breadcrumb) {
                if (isset($breadcrumb['url'])) {
                    echo $this->Html->tag('li', $this->Html->link($breadcrumb['title'], $breadcrumb['url']), ['class' => 'breadcrumb-item']);
                } else {
                    echo $this->Html->tag('li', $breadcrumb['title'], ['class' => 'breadcrumb-item active', 'aria-current' => 'page']);
                }
            }
            ?>
        </ol>
    </nav>
<?php endif; ?>
<style>
    .breadcrumb {
        padding: 0;
        background-color: #f5f7fa;
        margin-bottom: 1rem;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: "›";
    }
</style>
