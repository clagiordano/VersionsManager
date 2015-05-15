<?php
access_ensure_global_level(plugin_config_get('view_versions'));

$t_user                   = auth_get_current_user_id();
$t_recently_visited_array = recently_visited_bugs_get($t_user);
$t_recently_visited       = implode(', ', $t_recently_visited_array);

html_page_top();


echo '<br /><span class="pagetitle">',
 string_display(lang_get('projects_title')), '</span><br />';


get_projects();
?>

<br />
<table class="width100" cellspacing="1">
    <tr class="row-category">
        <td width="20%">
            <?php echo lang_get('name'); ?>
        </td>
        <td width="10%">
            <?php echo lang_get('version'); ?>
        </td>
        <td width="10%">
            <?php echo lang_get('status'); ?>
        </td>
        <td width="20%">
            <?php echo lang_get('description'); ?>
        </td>
        <td width="10%">
            <?php echo lang_get('released'); ?>
        </td>
        <td width="10%">
            <?php echo lang_get('scheduled_release'); ?>
        </td>
    </tr>

    <?php foreach ($array as $value) { ?>

    <?php } ?>
</table>
<?php
    html_page_bottom();

    