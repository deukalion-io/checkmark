<?php

/**
 * PLUGIN external file
 *
 * @package    local_PLUGIN
 * @copyright  20XX YOURSELF
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require_once($CFG->libdir . "/externallib.php");
require_once($CFG->libdir . "/completionlib.php");

class theme_sandbox_external extends external_api
{
    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function sandbox_is_complete_parameters() {
        return new external_function_parameters(
            array(
                'courseid' => new external_value(PARAM_INT, 'Course ID'),
                'cmid' => new external_value(PARAM_INT, 'Course module ID'))
            );
    }

    /**
     * The function itself
     * @return string welcome message
     */
    public static function sandbox_is_complete($courseid, $cmid) {
        global $DB;
        //Parameters validation
        $params = self::validate_parameters(self::sandbox_is_complete_parameters(),
            array('courseid' => $courseid, 'cmid' => $cmid));
        $course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
        $completion_info = new completion_info($course);
        $mods = get_fast_modinfo($courseid);
        $cm = $mods->get_cm($cmid);
        $completion_data = $completion_info->get_data($cm);
        return boolval($completion_data->completionstate);
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function sandbox_is_complete_returns() {
        return new external_value(PARAM_BOOL, 'Boolean value');
    }

}
