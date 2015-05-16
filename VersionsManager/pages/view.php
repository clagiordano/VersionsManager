<?php

access_ensure_global_level(plugin_config_get('view_versions'));

html_page_top();

echo '<br /><span class="pagetitle">', string_display(lang_get('projects_title')), '</span><br />';
?>

<link rel='stylesheet' type="text/css" href="<?php echo plugin_file('style.css'); ?>" />

<br />
<table class="width100 version-table" cellspacing="1">
    <tr class="row-category">
        <th width="10%">
            <?php echo lang_get('name'); ?>
        </th>
        <th width="10%">
            <?php echo lang_get('version'); ?>
        </th>
        <th width="15%">
            <?php echo lang_get('status'); ?>
        </th>
        <th width="30%">
            <?php echo lang_get('description'); ?>
        </th>
        <th width="5%">
            <?php echo lang_get('released'); ?>
        </th>
        <th width="10%">
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

        <tr <?php echo helper_alternate_class(); ?>>
            <td>
                <?php echo string_display($project['name']); ?>
            </td>
            <td class="center">
                <?php echo string_display($project['version']); ?>
            </td>
            <td class="center">
                <?php echo get_enum_element('project_status', $project['status']); ?>
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

<?php
html_page_bottom();

