<?php

access_ensure_global_level(plugin_config_get('view_versions'));


$t_user                   = auth_get_current_user_id();
$t_recently_visited_array = recently_visited_bugs_get($t_user);
$t_recently_visited       = implode(', ', $t_recently_visited_array);




html_page_top(); // plugin_lang_get("ViewPage")


echo '<br /><span class="pagetitle">',
 string_display("Projects Versions:"), '</span><br />';


$t_project_index = 0;

version_cache_array_rows($t_project_ids);
category_cache_array_rows_by_project($t_project_ids);

foreach ($t_project_ids as $t_project_id) {

}

html_page_bottom();

