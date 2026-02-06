<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
    // Include header
    get_template_part('template-parts/header');

    // Include main content
    get_template_part('template-parts/main-content');

    // Include footer
    get_template_part('template-parts/footer');
    ?>

    <?php wp_footer(); ?>
</body>
</html>