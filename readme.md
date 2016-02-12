# OB Blocks

Features:
- Skapar en custom post type som heter Blocks
- Har ett gäng sköna custom fields som måste läggas till
- Har ett gäng sköna helper functions

Dependencies:

- Advanced Custom Fields (PRO)
- Posts To Posts

## Exempel

````php
<?php foreach( blocks_on_page() as $post ) : setup_postdata( $post ); ?>
    <div class="block">
        <figure>
            <img src="<?php echo get_block_image_url(); ?>">
        </figure>
        
        <?php echo get_block_content();?>
        
        <?php if ( block_has_link() ) : ?>
            <a class="button" href="<?php echo get_block_link();?>">
                <?php echo get_block_button_label(); ?>
            </a>
        <?php endif; ?>

    </div>
<?php wp_reset_postdata(); endforeach; ?>
```

## Funktioner

`get_block_image()`  
`get_block_image_id()` 
`get_block_image_url()`

`get_block_content()`  

`block_has_link()`
`block_has_external_link()`
`get_external_block_link()`
`get_block_link()`

`block_has_button()`
`get_block_button_label()`
