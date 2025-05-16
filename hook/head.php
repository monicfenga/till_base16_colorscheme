<?php defined('FLATBOARD') or die('Flatboard Community.');
global $out;
//var_dump($out['self']);die;
// 如果是管理页面，就不应用插件了
if ($out['self'] === 'config') {
    return;
}
if (!isset($till_base16_settings)) {
    $till_base16_settings = flatDB::readEntry('plugin', 'till_base16_colorscheme');
}

if (!function_exists('checkIsBetweenTime')) {
    /**
     * 判断当前的时分是否在指定的时间段内
     * @param string $start 开始时分  eg:10:30
     * @param string $end 结束时分   eg:15:30
     * @param bool $nextday 结束时间是否在第二天？（用于判断“从晚上到第二天早上”的情况）
     * @author mzc
     * @date 2018/8/9 10:46
     * @return bool  true:在范围内，false:没在范围内
     */

    function checkIsBetweenTime($start, $end, $nextday = false) {
        $date = date('H:i');
        $curTime = strtotime($date); //当前时分
        $assignTime1 = strtotime($start); //获得指定分钟时间戳，00:00
        if ($nextday) {
            $assignTime2 = strtotime($end . ' +24 hours'); //获得指定分钟时间戳，01:00 + 24小时
        } else {
            $assignTime2 = strtotime($end); //获得指定分钟时间戳，01:00
        }
        if ($curTime > $assignTime1 && $curTime < $assignTime2) {
            return true;
        }
        return false;
    }
}

function b16_pane_demo_build_css($b16_settings_data = [], $mode = '') {
	$result = '';
    switch($mode) {
        case 'light':
            $result = '.light-style {';
            break;
        case 'dark':
            $result = '.dark-style {';
            break;
        default:
            $result = ':root {';
            break;
    }
	foreach ($b16_settings_data as $key => $value) {
		switch ($key) {
			case 'b16_color_body_bg':
				$result .= '--bs-body-background-color: var(--' . $value . '); ';
				break;
			case 'b16_color_body_fg':
				$result .= '--bs-body-color: var(--' . $value . '); ';
				break;
			case 'b16_color_container_bg':
				$result .= '--bs-container-background-color: var(--' . $value . '); ';
				break;
			case 'b16_color_bright_fg':
				$result .= '--bs-body-color-bright: var(--' . $value . '); ';
				break;
			case 'b16_color_muted_fg':
				$result .= '--bs-body-muted-color: var(--' . $value . '); ';
				break;
			case 'b16_color_selection_bg':
				$result .= '--bs-selection-bg: var(--' . $value . '); ';
				break;
			case 'b16_color_selection_fg':
				$result .= '--bs-selection-fg: var(--' . $value . '); ';
				break;
			case 'b16_color_primary_bg':
				$result .= '--bs-primary: var(--' . $value . '); ';
				break;
			case 'b16_color_primary_fg':
				$result .= '--bs-primary-fg: var(--' . $value . '); ';
				break;
			case 'b16_color_secondary_bg':
				$result .= '--bs-secondary: var(--' . $value . '); ';
				break;
			case 'b16_color_secondary_fg':
				$result .= '--bs-secondary-fg: var(--' . $value . '); ';
				break;
			case 'b16_color_info_bg':
				$result .= '--bs-info: var(--' . $value . '); ';
				break;
			case 'b16_color_info_fg':
				$result .= '--bs-info-fg: var(--' . $value . '); ';
				break;
			case 'b16_color_success_bg':
				$result .= '--bs-success: var(--' . $value . '); ';
				break;
			case 'b16_color_success_fg':
				$result .= '--bs-success-fg: var(--' . $value . '); ';
				break;
			case 'b16_color_warning_bg':
				$result .= '--bs-warning: var(--' . $value . '); ';
				break;
			case 'b16_color_warning_fg':
				$result .= '--bs-warning-fg: var(--' . $value . '); ';
				break;
			case 'b16_color_danger_bg':
				$result .= '--bs-danger: var(--' . $value . '); ';
				break;
			case 'b16_color_danger_fg':
				$result .= '--bs-danger-fg: var(--' . $value . '); ';
				break;
				case 'b16_color_nav_bg':
				if (boolval($b16_settings_data['b16_custom_nav_color'])) {
					$result .= '--bs-navbar-background-color: var(--' . $value . '); ';
				}
				break;
			case 'b16_color_nav_fg':
				if (boolval($b16_settings_data['b16_custom_nav_color'])) {
					$result .= '--bs-navbar-color: var(--' . $value . '); ';
				}
				break;
			default:
				break;
		}
	}
	$result .= '}';
	return $result;
}

$till_base16_color_mode = 'light';
$till_base16_body_class = 'light-style';
$till_base16_color_scheme_href = $till_base16_settings['light_mode']['b16_color_scheme_href'];
if (
    $till_base16_settings['b16_color_mode']=== 'dark' ||
    ($till_base16_settings['b16_color_mode'] === 'auto' &&
    checkIsBetweenTime($till_base16_settings['b16_switch_to_dark_time'],$till_base16_settings['b16_switch_to_light_time'], true)
    )
) {
    $till_base16_color_mode = 'dark';
    $till_base16_body_class = 'dark-style';
    $till_base16_color_scheme_href = $till_base16_settings['dark_mode']['b16_color_scheme_href'];
}
?>

<?php if($till_base16_settings['b16_inject_location'] === 'body_start'): ?>
<!--=====================================
=             Base16 Header             =
======================================-->
<link href="./plugin/till_base16_colorscheme/view/css/theme-base16.css" type="text/css" rel="stylesheet" id="theme_base16">
<!-- The current time is <?= date('H:i') ?> -->
<link 
href="<?= $till_base16_color_scheme_href ?>" 
data-light_mode_href="<?= $till_base16_settings['light_mode']['b16_color_scheme_href'] ?>" 
data-dark_mode_href="<?= $till_base16_settings['dark_mode']['b16_color_scheme_href'] ?>" 
tpye="text/css" rel="stylesheet" id="pallete_base16">
<style id="custom_light_base16"><?= b16_pane_demo_build_css($till_base16_settings['light_mode'],'light'); ?></style>
<style id="custom_dark_base16"><?= b16_pane_demo_build_css($till_base16_settings['dark_mode'],'dark'); ?></style>
<style id="custom_css_base16"><?= $till_base16_settings['b16_custom_css']; ?></style>
<!--=======  End of Base16 Header  ========-->
<?php endif; ?>