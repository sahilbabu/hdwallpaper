<?php
$args = array(
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true,
    'exclude' => array(),
    'exclude_tree' => array(),
    'include' => array(),
    'number' => '',
    'fields' => 'all',
    'slug' => '',
    'parent' => 0,
    'hierarchical' => true,
    'child_of' => 0,
    'get' => '',
    'name__like' => '',
    'pad_counts' => false,
    'offset' => '',
    'search' => '',
    'cache_domain' => 'core'
);
$term_list = wp_get_post_terms($post->ID, 'resolution', $args);


$cat_ids = array();

$k = 0;
foreach ($term_list as $cat) {

    $cat_ids[$k] = $cat->term_id;
    $k++;
}



$terms_p = get_terms("resolution", $args);

if (!empty($terms_p) && !is_wp_error($terms_p)) {

    foreach ($terms_p as $term_p) {
        if (in_array($term_p->term_id, $cat_ids)) {
            $term_p = sanitize_term($term_p, 'resolution');

            $term_p_link = get_term_link($term_p, 'resolution');
            $term_id = $term_p->term_id;
            ?>
            <div class="row-fluid margin-top-border">
                <div class="span3"><h4 class="widgettitle"><?php echo $term_p->name ?></h4></div>
                <?php
                $term_id = $term_p->term_id;
                $taxonomy_name = 'resolution';
                $termchildren = get_term_children($term_id, $taxonomy_name);
                if (!empty($termchildren)) {
                    ?>
                    <div class="span9">
                        <?php
                        foreach ($termchildren as $child) {
                            $term = get_term_by('id', $child, $taxonomy_name);
                            $term = sanitize_term($term, 'resolution');
                            if (in_array($term->term_id, $cat_ids)) {
                                $term_link = get_term_link($term, 'resolution');

                                $dimention = explode("X", $term->name);
                                ?>
                                <a class="btn" href="<?php echo site_url('/'); ?>download.php?download_file=<?php print urlencode($large_image_full[0]); ?>&w=<?php echo $dimention[0]; ?>&h=<?php echo $dimention[1]; ?>"><?php echo $term->name; ?></a>

                                <?php
                            }
                        }
                        ?> 
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
}
?>