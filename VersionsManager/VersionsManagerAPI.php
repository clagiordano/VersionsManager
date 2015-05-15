<?php

function get_projects()
{
    /**
     * Get accessible projects
     */
    $t_accessible_projects = user_get_accessible_projects(
            auth_get_current_user_id(), true
    );

    $t_query = "
        SELECT
            pt.name,
            vt.version,
            pt.status,
            vt.description,
            IF(vt.released, '" . lang_get('yes') . "', '" . lang_get('no') . "') AS released,

            DATE_FORMAT(FROM_UNIXTIME(vt.date_order), '%d/%m/%Y') scheduled_release
        FROM
            mantis_project_version_table vt,
            mantis_project_table pt

        WHERE
            vt.project_id = pt.id
        AND
            vt.obsolete = 0
        AND
            pt.id IN (" . join(",", $t_accessible_projects) . ")

        ORDER BY
            pt.name,
            vt.version
    ";

    $t_resource = db_query_bound($t_query);

    while ($row = db_fetch_array($t_resource)) {
        $t_results[] = $row;
    }

    return $t_resource;
}
