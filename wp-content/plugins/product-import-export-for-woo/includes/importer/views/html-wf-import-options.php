<form action="<?php echo admin_url('admin.php?import=' . $this->import_page . '&step=2&merge=' . $merge); ?>" method="post">
    <?php wp_nonce_field('import-woocommerce'); ?>
    <input type="hidden" name="import_id" value="<?php echo $this->id; ?>" />
    <?php if ($this->file_url_import_enabled) : ?>
        <input type="hidden" name="import_url" value="<?php echo $this->file_url; ?>" />
    <?php endif; ?>
    <h3><?php _e('Map Fields', 'wf_csv_import_export'); ?></h3>
    <p><?php _e('Here you can map your imported columns to product data fields.', 'wf_csv_import_export'); ?></p>
    <table class="widefat widefat_importer">
        <thead>
            <tr>
                <th><?php _e('Map to', 'wf_csv_import_export'); ?></th>
                <th><?php _e('Column Header', 'wf_csv_import_export'); ?></th>
                <th><?php _e('Evaluation Field', 'wf_csv_import_export'); ?>
                    <?php $plugin_url = WC()->plugin_url(); ?>
                    <img class="help_tip" style="float:none;" data-tip="<?php _e('Assign constant value HikeFoce to post_author:</br>=HikeFoce</br>Add $5 to Price:sale_price:</br>+5</br>Reduce $5 to Price:sale_price:</br>-5</br>Multiple 1.05 to Price:sale_price:</br>*1.05</br>Divide Price:sale_price by 2:</br>/2</br>Append a value By HikeFoce to post_title:</br>&By HikeFoce</br>Prepend a value HikeFoce to post_title:</br>&HikeFoce [VAL].', 'wf_csv_import_export'); ?>" src="<?php echo $plugin_url; ?>/assets/images/help.png" height="20" width="20" /> 
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $wpost_attributes = include( dirname(__FILE__) . '/../data/data-wf-reserved-fields-pair.php' );
            
            $taxonomy_n_attributes_items = array();
            foreach ($taxonomies as $taxonomy) {
                if (substr($taxonomy, 0, 3) !== 'pa_')
                $taxonomy_n_attributes_items['tax:' . $taxonomy] = 'tax:' . $taxonomy. '| Product Taxonomies';
            }
            foreach ($taxonomies as $taxonomy) {
                if (substr($taxonomy, 0, 3) == 'pa_')
                $taxonomy_n_attributes_items['attribute:' . $taxonomy] = 'attribute:' . $taxonomy. '| Taxonomy Attributes';
            }
            foreach ($attributes as $attr) {
                $attr = sanitize_title($attr);
                if (substr($attr, 0, 3) !== 'pa_')
                $taxonomy_n_attributes_items['attribute:' . $attr] = 'attribute:' . $attr. '| Product Attributes';
                $taxonomy_n_attributes_items['attribute_data:' . $attr] = 'attribute_data:' .$attr. '| Product Attributes Data';
                $taxonomy_n_attributes_items['attribute_default:' . $attr] = 'attribute_default:' .$attr. '| Product Attributes default';
            }
            
            foreach ($raw_headers as $key => $column) {
                if(!empty($taxonomy_n_attributes_items[$key]))
                            continue;
                if (strstr($key, 'tax:')) {
                    $column = trim(str_replace('tax:', '', $key));
                    $taxonomy_n_attributes_items['tax:' . $column] = 'tax:' . $column . '| New Taxonomy:' . $column;
                } elseif (strstr($key, 'meta:')) {
                    $column = trim(str_replace('meta:', '', $key));
                    $taxonomy_n_attributes_items['meta:' . $column] = 'meta:' . $column . '| Custom Field:' . $column;
                } elseif (strstr($key, 'attribute:')) {
                    $column = trim(str_replace('attribute:', '', $key));
                    $taxonomy_n_attributes_items['attribute:' . $column] = 'attribute:' . $column . '| New Product Attribute:' . $column;
                } elseif (strstr($key, 'attribute_data:')) {
                    $column = trim(str_replace('attribute_data:', '', $key));
                    $taxonomy_n_attributes_items['attribute_data:' . $column] = 'attribute_data:' . $column . '| New Product Attribute Data:' . $column;
                } elseif (strstr($key, 'attribute_default:')) {
                    $column = trim(str_replace('attribute_default:', '', $key));
                    $taxonomy_n_attributes_items['attribute_default:' . $column] = 'attribute_default:' . $column . '| New Product Attribute default value:' . $column;
                }
            }
            
 