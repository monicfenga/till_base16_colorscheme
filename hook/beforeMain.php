<?php defined('FLATBOARD') or die('Flatboard Community.');
// 如果是管理页面，就不应用插件了
if ($out['self'] === 'config') {
    return;
}
if (!isset($till_base16_settings)) {
    $till_base16_settings = flatDB::readEntry('plugin', 'till_base16_colorscheme');
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
<script>document.querySelector('body').classList.add('<?= $till_base16_body_class ?>');</script>
<?php if($till_base16_settings['b16_show_color_mode_switch']): ?>
<script id="b16_color_mode_switch_js_h">

    function b16_get_color_mode() {
        if (localStorage.getItem('b16_color_mode') === null) {
            localStorage.setItem('b16_color_mode', 'unset');
        }
        return localStorage.getItem('b16_color_mode');
    }
    function b16_apply_color_mode(mode = '', update_css = true, update_label = true) {
        if (mode.length === 0) {
            mode = localStorage.getItem('b16_color_mode');
        }
        switch (mode) {
            case 'light':
                if (update_css) {
                    if (document.querySelector('body').classList.contains('dark-style')) {
                        document.querySelector('body').classList.remove('dark-style');
                    }
                    document.querySelector('body').classList.add('light-style');
                    document.getElementById('pallete_base16').href = document.getElementById('pallete_base16').getAttribute('data-light_mode_href');
                }
                if (update_label && document.getElementById('b16_color_mode_switch') !== null) {
                    this_mode_name = 'Light';
                    document.querySelector('#b16_color_mode_switch > i').setAttribute('class', 'fa fa-sun-o');
                    document.querySelector('#b16_color_mode_switch > span').innerHTML = this_mode_name;
                    if (document.querySelector('#b16_color_mode_switch').getAttribute('data-bs-original-title') !== null) {
                        document.querySelector('#b16_color_mode_switch').setAttribute('data-bs-original-title', this_mode_name + '；' + document.querySelector('#b16_color_mode_switch').getAttribute('data-real-original-title'));
                    }
                }
                break;
            case 'dark':
                if (update_css) {
                    if (document.querySelector('body').classList.contains('light-style')) {
                        document.querySelector('body').classList.remove('light-style');
                    }
                    document.querySelector('body').classList.add('dark-style');
                    document.getElementById('pallete_base16').href = document.getElementById('pallete_base16').getAttribute('data-dark_mode_href');

                }
                if (update_label && document.getElementById('b16_color_mode_switch') !== null) {
                    this_mode_name = 'Dark';
                    document.querySelector('#b16_color_mode_switch > i').setAttribute('class', 'fa fa-moon-o');
                    document.querySelector('#b16_color_mode_switch > span').innerHTML = this_mode_name;
                    if (document.querySelector('#b16_color_mode_switch').getAttribute('data-bs-original-title') !== null) {
                        document.querySelector('#b16_color_mode_switch').setAttribute('data-bs-original-title', this_mode_name + '；' + document.querySelector('#b16_color_mode_switch').getAttribute('data-real-original-title'));
                    }
                }
                break;

            case 'auto':
                // TODO
                if (update_label && document.getElementById('b16_color_mode_switch') !== null) {
                    this_mode_name = 'Auto';
                    document.querySelector('#b16_color_mode_switch  > i').setAttribute('class', 'fa fa-adjust');
                    document.querySelector('#b16_color_mode_switch  > span').innerHTML = this_mode_name;
                    if (document.querySelector('#b16_color_mode_switch').getAttribute('data-bs-original-title') !== null) {
                        document.querySelector('#b16_color_mode_switch').setAttribute('data-bs-original-title', this_mode_name + '；' + document.querySelector('#b16_color_mode_switch').getAttribute('data-real-original-title'));
                    }
                }
                break;
            default:
                // Do nothing
                break;
        }
        console.info('Current color mode: ' + mode);
    }
    function b16_switch_color_mode() {
        switch (localStorage.getItem('b16_color_mode')) {
            case 'light':
                localStorage.setItem('b16_color_mode', 'dark');
                break;
            case 'dark':
                localStorage.setItem('b16_color_mode', 'auto');
                break;
            case 'auto':
                localStorage.setItem('b16_color_mode', 'light');
                break;
            default:
                localStorage.setItem('b16_color_mode', 'light');
                break;
        }
    }
</script>
<?php if($till_base16_settings['b16_inject_location'] === 'body_start'): ?>
<script>b16_apply_color_mode(b16_get_color_mode(), true, false);</script>
<?php endif; ?>

<?php endif; ?>
