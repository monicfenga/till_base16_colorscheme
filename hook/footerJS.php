<?php defined('FLATBOARD') or die('Flatboard Community.');
global $out;
// 如果是管理页面，就不应用插件了
if ($out['self'] === 'config') {
    return;
}
if (!isset($till_base16_settings)) {
    $till_base16_settings = flatDB::readEntry('plugin', 'till_base16_colorscheme');
}

if($till_base16_settings['b16_inject_location'] === 'body_end'): ?>
<!--=====================================
=             Base16 Header             =
======================================-->
<link href="./plugin/till_base16_colorscheme/view/css/theme-base16.css" type="text/css" rel="stylesheet" id="theme_base16">
<!-- The current time is <?= date('H:i') ?> -->
<link
      href="<?= $till_base16_color_scheme_href ?>"
      data-light_mode_href="<?= $till_base16_settings['light_mode']['b16_color_scheme_href'] ?>"
      data-dark_mode_href="<?= $till_base16_settings['dark_mode']['b16_color_scheme_href'] ?>"
      type="text/css" rel="stylesheet" id="pallete_base16">
<style id="custom_light_base16">
    <?=b16_pane_demo_build_css($till_base16_settings['light_mode'], 'light');
    ?>
</style>
<style id="custom_dark_base16">
    <?=b16_pane_demo_build_css($till_base16_settings['dark_mode'], 'dark');
    ?>
</style>
<style id="custom_css_base16">
    <?=$till_base16_settings['b16_custom_css'];
    ?>
</style>
<!--=======  End of Base16 Header  ========-->
<?php endif; ?>

<?php if($till_base16_settings['b16_show_color_mode_switch']): ?>
<!--=====================================
=        Base16 Color Mode Toggle       =
======================================-->
<button type="button" id="b16_color_mode_switch" title="Color Mode">
    <i class="icon-sync"></i>
    <span class="sr-only">auto</span>
</button>
<style id="b16_color_mode_switch_css">
    #b16_color_mode_switch {
        position: fixed;
        bottom: 1rem;
        left: 1rem;
        width: 2.5em;
        height: 2.5em;
        border: none;
        background-color: var(--bs-primary);
        border-radius: 2em;
        z-index: 10000;
    }
</style>
<script id="b16_color_mode_switch_js_f">

    const b16_color_mode_switch_btn = document.getElementById('b16_color_mode_switch');

    b16_color_mode_switch_btn.addEventListener('click', function () {
        b16_switch_color_mode();
        b16_apply_color_mode();
    });
    b16_apply_color_mode(b16_get_color_mode(), true, true);
</script>

<!--=======  End of Base16 Color Mode Toggle  ========-->
<?php endif; ?>

<!--=====================================
=              Base16 Footer            =
======================================-->
<script id="prettyprint_js" src="./plugin/till_base16_colorscheme/view/js/prettify.js"></script>
<script id="prettyprint_js__extension" src="./plugin/till_base16_colorscheme/view/js/prettify-lang-combo.min.js"></script>
<script id="prettyprint_js_init">
    document.addEventListener("DOMContentLoaded", function () { 
        var preElements = document.querySelectorAll("section pre:not(.prettyprint)");
        preElements.forEach(function (preElement) {
            preElement.classList.add("prettyprint");
        });
        prettyPrint();
    });
</script>
<!--=======  End of Base16 Footer  ========-->