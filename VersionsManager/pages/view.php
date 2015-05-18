<?php
access_ensure_global_level(plugin_config_get('view_versions'));

html_page_top();

?>

<link rel='stylesheet' type="text/css" href="<?php echo plugin_file('style.css'); ?>" />

<div class="table-container">
    <table class="version-table">
        <tr class="row-category">
            <th>
                <?php echo lang_get('name'); ?>
            </th>
            <th>
                <?php echo lang_get('version'); ?>
            </th>
            <th>
                <?php echo lang_get('status'); ?>
            </th>
            <th>
                <?php echo lang_get('description'); ?>
            </th>
            <th>
                <?php echo lang_get('released'); ?>
            </th>
            <th>
                <?php echo lang_get('scheduled_release'); ?>
            </th>
        </tr>

        <?php
        foreach (get_projects() as $project) {
            if ($project['released_bool'] == true) {
                $t_class = "class=\"center released\"";
            } else {
                $t_class = "class=\"center not-released\"";
            }
            ?>

            <tr >
                <td>
                    <?php echo string_display($project['name']); ?>
                </td>
                <td class="center">
                    <?php
                        print_link( 'manage_proj_ver_edit_page.php?version_id=' . $project['version_id'],
                            string_display($project['version'])); ?>
                </td>
                <td class="center">
                    <?php
                    echo get_enum_element('project_status', $project['status']);
                    ?>
                </td>
                <td>
                    <?php echo string_display($project['description']); ?>
                </td>
                <td <?php echo $t_class; ?>>
                    <?php echo string_display($project['released']); ?>
                </td>
                <td class="center">
                    <?php echo string_display($project['scheduled_release']); ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php
html_page_bottom();

