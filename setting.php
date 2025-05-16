<?php defined('FLATBOARD') or die('Flatboard Community.'); ?>
<input type="checkbox" name="b16-settings-wrapper-faded" id="b16-settings-wrapper-faded" style="display:none">
<label for="b16-settings-wrapper-faded" class="b16-settings-wrapper-faded-button" title="显示Xiuno BBS菜单">≡</label>

<section class="b16-settings-wrapper">
	<link rel="stylesheet" href="<?= str_replace(PATH_ROOT, getCurrentUrl(), PLUGIN_DIR) . $plugin . DS ?>view/css/base16/base16-default-light.css" id="pallete_setting_base16">
	<link rel="stylesheet" href="<?= str_replace(PATH_ROOT, getCurrentUrl(), PLUGIN_DIR) . $plugin . DS ?>view/css/web16.css" id="web16_css">
	<link rel="stylesheet" href="<?= str_replace(PATH_ROOT, getCurrentUrl(), PLUGIN_DIR) . $plugin . DS ?>view/css/b16_settings.css" id="b16_settings_css">
	<input type="checkbox" name="b16-pane-demo-opened" id="b16-pane-demo-opened" style="display:none">
	<section class="b16-pane-settings">
		<form action="<?= $FORM_ACTION ?>" method="post" id="b16-pane-settings-form">
			<input type="radio" class="b16_pane_settings_tab_input" name="b16_pane_settings_tab_input" value="1" id="b16_pane_settings_tab_input-1" checked>
			<input type="radio" class="b16_pane_settings_tab_input" name="b16_pane_settings_tab_input" value="2" id="b16_pane_settings_tab_input-2">
			<input type="radio" class="b16_pane_settings_tab_input" name="b16_pane_settings_tab_input" value="3" id="b16_pane_settings_tab_input-3">
			<input type="radio" class="b16_pane_settings_tab_input" name="b16_pane_settings_tab_input" value="4" id="b16_pane_settings_tab_input-4">
			<article class="b16-pane-settings-tab-pane" id="b16_pane_settings_tab_pane_1">
				<h1><?= lang('theme_helper_welcome') ?></h1>
				<h2><?= lang('theme_helper_prompt') ?></h2>
				<div class="row">
					<div class="col c4">
						<label for="b16_pane_settings_tab_input-2">
							<span class="b16-button b16-button-primary"><?= lang('light_mode_colors') ?>
								<br>
								<span class="light_mode_b16_color_scheme_selected"></span>
							</span>
						</label>
					</div>
					<div class="col c4">
						<label for="b16_pane_settings_tab_input-3">
							<span class="b16-button b16-button-primary"><?= lang('dark_mode_colors') ?>
								<br>
								<span class="dark_mode_b16_color_scheme_selected"></span>
							</span>
						</label>
					</div>
					<div class="col c4">
						<label for="b16_pane_settings_tab_input-4">
							<span class="b16-button b16-button-primary"><?= lang('plugin_settings') ?></span>
						</label>
					</div>
				</div>
				<p class="text-body"><?= lang('menu_hint') ?></p>
				<p class="help-block"><?= lang('save_reminder') ?>!</p>
				<button type="submit" class="b16-button b16-button-success"><?= lang('save_settings') ?></button>

			</article>
			<article class="b16-pane-settings-tab-pane" id="b16_pane_settings_tab_pane_2">
				<header class="b16-pane-settings-header">
					<label for="b16_pane_settings_tab_input-1">
						<span class="b16-button b16-button-primary" title="<?= lang('back') ?>">←</span>
					</label>
					<h2><?= lang('light_mode') ?></h2>
					<p></p>
				</header>
				<details>
					<summary>
						<h3>🎨 <?= lang('choose_colorscheme') ?></h3>
						<span class="light_mode_b16_color_scheme_selected"></span>
					</summary>
					<?= form_b16_color_scheme_selector('light_mode[b16_color_scheme]', $settings['light_mode']['b16_color_scheme']) ?>
				</details>

				<h3>📝 <?= lang('custom_colors') ?></h3>
				<section>
					<h4><?= lang('page_section') ?></h4>
					<div class="row">
						<div class="col c12">
							<h5><?= lang('page_bg_color') ?></h5>
							<p class="help-block"><?= lang('page_bg_desc') ?></p>
							<?= form_b16_color_selector('light_mode[b16_color_body_bg]', $settings['light_mode']['b16_color_body_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('container_bg_color') ?></h5>
							<p class="help-block"><?= lang('container_bg_desc') ?></p>
							<?= form_b16_color_selector('light_mode[b16_color_container_bg]', $settings['light_mode']['b16_color_container_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<p class="help-block"><?= lang('text_color_desc') ?></p>
							<?= form_b16_color_selector('light_mode[b16_color_body_fg]', $settings['light_mode']['b16_color_body_fg']) ?>
						</div>
						<div class="col c12" style="text-align:center">└─── <?= lang('contrast') ?>：<span id="b16_light_mode_color_body__contrast_result">...</span> ───┘</div>
						<div class="col c6">
							<h5><?= lang('emphasis_text_color') ?></h5>
							<p class="help-block"><?= lang('emphasis_text_desc') ?></p>
							<?= form_b16_color_selector('light_mode[b16_color_bright_fg]', $settings['light_mode']['b16_color_bright_fg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('secondary_text_color') ?></h5>
							<p class="help-block"><?= lang('secondary_text_desc') ?></p>
							<?= form_b16_color_selector('light_mode[b16_color_muted_fg]', $settings['light_mode']['b16_color_muted_fg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('selected_text_bg') ?></h5>
							<p class="help-block"><?= lang('selected_text_hint') ?></p>
							<?= form_b16_color_selector('light_mode[b16_color_selection_bg]', $settings['light_mode']['b16_color_selection_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('selected_text_color') ?></h5>
							<p class="help-block"><?= lang('selected_text_hint') ?></p>
							<?= form_b16_color_selector('light_mode[b16_color_selection_fg]', $settings['light_mode']['b16_color_selection_fg']) ?>
						</div>
						<div class="col c12" style="text-align:center">└─── <?= lang('contrast') ?>：<span id="b16_light_mode_color_selection__contrast_result">...</span> ───┘</div>
					</div>
				</section>
				<section>
					<h4><?= lang('nav_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_light_mode_color_nav__contrast_result">...</span></p>
					<div class="col c12">
						<h5><?= lang('enable_nav_color') ?></h5>
						<?= form_radio_yes_no('light_mode[b16_custom_nav_color]', $settings['light_mode']['b16_custom_nav_color']) ?>
					</div>
					<div class="col c6">
						<h5><?= lang('nav_bg_color') ?></h5>
						<?= form_b16_color_selector('light_mode[b16_color_nav_bg]', $settings['light_mode']['b16_color_nav_bg']) ?>
					</div>
					<div class="col c6">
						<h5><?= lang('nav_text_color') ?></h5>
						<?= form_b16_color_selector('light_mode[b16_color_nav_fg]', $settings['light_mode']['b16_color_nav_fg']) ?>
					</div>
				</section>
				<section>
					<h4><?= lang('primary_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_light_mode_color_primary__contrast_result">...</span></p>
					<p class="help-block"><?= lang('primary_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_primary_bg]', $settings['light_mode']['b16_color_primary_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_primary_fg]', $settings['light_mode']['b16_color_primary_fg']) ?>
						</div>
					</div>
				</section>
				<section>
					<h4><?= lang('secondary_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_light_mode_color_secondary__contrast_result">...</span></p>
					<p class="help-block"><?= lang('secondary_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_secondary_bg]', $settings['light_mode']['b16_color_secondary_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_secondary_fg]', $settings['light_mode']['b16_color_secondary_fg']) ?>
						</div>
					</div>
				</section>
				<section>

					<h4><?= lang('info_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_light_mode_color_info__contrast_result">...</span></p>
					<p class="help-block"><?= lang('info_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_info_bg]', $settings['light_mode']['b16_color_info_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_info_fg]', $settings['light_mode']['b16_color_info_fg']) ?>
						</div>
					</div>
				</section>
				<section>

					<h4><?= lang('success_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_light_mode_color_success__contrast_result">...</span></p>
					<p class="help-block"><?= lang('success_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_success_bg]', $settings['light_mode']['b16_color_success_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_success_fg]', $settings['light_mode']['b16_color_success_fg']) ?>
						</div>
					</div>
				</section>
				<section>

					<h4><?= lang('warning_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_light_mode_color_warning__contrast_result">...</span></p>
					<p class="help-block"><?= lang('warning_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_warning_bg]', $settings['light_mode']['b16_color_warning_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_warning_fg]', $settings['light_mode']['b16_color_warning_fg']) ?>
						</div>
					</div>
				</section>
				<section>

					<h4><?= lang('danger_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_light_mode_color_danger__contrast_result">...</span></p>
					<p class="help-block"><?= lang('danger_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_danger_bg]', $settings['light_mode']['b16_color_danger_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('light_mode[b16_color_danger_fg]', $settings['light_mode']['b16_color_danger_fg']) ?>
						</div>
					</div>
				</section>
			</article>
			<article class="b16-pane-settings-tab-pane" id="b16_pane_settings_tab_pane_3">
				<header class="b16-pane-settings-header">
					<label for="b16_pane_settings_tab_input-1">
						<span class="b16-button b16-button-primary" title="<?= lang('back') ?>">←</span>
					</label>
					<h2><?= lang('dark_mode') ?></h2>
					<p></p>
				</header>
				<details>
					<summary>
						<h3>🎨 <?= lang('choose_colorscheme') ?></h3>
						<span class="dark_mode_b16_color_scheme_selected"></span>
					</summary>
					<?= form_b16_color_scheme_selector('dark_mode[b16_color_scheme]', $settings['dark_mode']['b16_color_scheme']) ?>
				</details>

				<h3>📝 <?= lang('custom_colors') ?></h3>
				<section>
					<h4><?= lang('page_section') ?></h4>
					<p class="help-block"><?= lang('primary_recommend') ?></p>
					<div class="row">
						<div class="col c12">
							<h5><?= lang('page_bg_color') ?></h5>
							<p class="help-block"><?= lang('page_bg_desc') ?></p>
							<?= form_b16_color_selector('dark_mode[b16_color_body_bg]', $settings['dark_mode']['b16_color_body_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('container_bg_color') ?></h5>
							<p class="help-block"><?= lang('container_bg_desc') ?></p>
							<?= form_b16_color_selector('dark_mode[b16_color_container_bg]', $settings['dark_mode']['b16_color_container_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_body_fg]', $settings['dark_mode']['b16_color_body_fg']) ?>
						</div>
						<div class="col c12" style="text-align:center">└─── <?= lang('contrast') ?>：<span id="b16_dark_mode_color_body__contrast_result">...</span> ───┘</div>

						<div class="col c6">
							<h5><?= lang('emphasis_text_color') ?></h5>
							<p class="help-block"><?= lang('emphasis_text_desc') ?></p>
							<?= form_b16_color_selector('dark_mode[b16_color_bright_fg]', $settings['dark_mode']['b16_color_bright_fg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('secondary_text_color') ?></h5>
							<p class="help-block"><?= lang('secondary_text_desc') ?></p>
							<?= form_b16_color_selector('dark_mode[b16_color_muted_fg]', $settings['dark_mode']['b16_color_muted_fg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('selected_text_bg') ?></h5>
							<p class="help-block"><?= lang('selected_text_hint') ?></p>
							<?= form_b16_color_selector('dark_mode[b16_color_selection_bg]', $settings['dark_mode']['b16_color_selection_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('selected_text_color') ?></h5>
							<p class="help-block"><?= lang('selected_text_hint') ?></p>
							<?= form_b16_color_selector('dark_mode[b16_color_selection_fg]', $settings['dark_mode']['b16_color_selection_fg']) ?>
						</div>
						<div class="col c12" style="text-align:center">└─── <?= lang('contrast') ?>：<span id="b16_dark_mode_color_selection__contrast_result">...</span> ───┘</div>
					</div>
				</section>
				<section>
					<h4><?= lang('nav_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_dark_mode_color_nav__contrast_result">...</span></p>
					<div class="col c12">
						<h5><?= lang('enable_nav_color') ?></h5>
						<?= form_radio_yes_no('dark_mode[b16_custom_nav_color]', $settings['dark_mode']['b16_custom_nav_color']) ?>
					</div>
					<div class="col c6">
						<h5><?= lang('nav_bg_color') ?></h5>
						<?= form_b16_color_selector('dark_mode[b16_color_nav_bg]', $settings['dark_mode']['b16_color_nav_bg']) ?>
					</div>
					<div class="col c6">
						<h5><?= lang('nav_text_color') ?></h5>
						<?= form_b16_color_selector('dark_mode[b16_color_nav_fg]', $settings['dark_mode']['b16_color_nav_fg']) ?>
					</div>
				</section>
				<section>
					<h4><?= lang('primary_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_dark_mode_color_primary__contrast_result">...</span></p>
					<p class="help-block"><?= lang('primary_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_primary_bg]', $settings['dark_mode']['b16_color_primary_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_primary_fg]', $settings['dark_mode']['b16_color_primary_fg']) ?>
						</div>
					</div>
				</section>
				<section>
					<h4><?= lang('secondary_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_dark_mode_color_secondary__contrast_result">...</span></p>
					<p class="help-block"><?= lang('secondary_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_secondary_bg]', $settings['dark_mode']['b16_color_secondary_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_secondary_fg]', $settings['dark_mode']['b16_color_secondary_fg']) ?>
						</div>
					</div>
				</section>
				<section>
					<h4><?= lang('info_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_dark_mode_color_info__contrast_result">...</span></p>
					<p class="help-block"><?= lang('info_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_info_bg]', $settings['dark_mode']['b16_color_info_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_info_fg]', $settings['dark_mode']['b16_color_info_fg']) ?>
						</div>
					</div>
				</section>
				<section>

					<h4><?= lang('success_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_dark_mode_color_success__contrast_result">...</span></p>
					<p class="help-block"><?= lang('success_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_success_bg]', $settings['dark_mode']['b16_color_success_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_success_fg]', $settings['dark_mode']['b16_color_success_fg']) ?>
						</div>
					</div>
				</section>
				<section>

					<h4><?= lang('warning_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_dark_mode_color_warning__contrast_result">...</span></p>
					<p class="help-block"><?= lang('warning_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_warning_bg]', $settings['dark_mode']['b16_color_warning_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_warning_fg]', $settings['dark_mode']['b16_color_warning_fg']) ?>
						</div>
					</div>
				</section>
				<section>

					<h4><?= lang('danger_section') ?></h4>
					<p class="text-body"><?= lang('contrast') ?>：<span id="b16_dark_mode_color_danger__contrast_result">...</span></p>
					<p class="help-block"><?= lang('danger_recommend') ?></p>
					<div class="row">
						<div class="col c6">
							<h5><?= lang('bg_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_danger_bg]', $settings['dark_mode']['b16_color_danger_bg']) ?>
						</div>
						<div class="col c6">
							<h5><?= lang('text_color') ?></h5>
							<?= form_b16_color_selector('dark_mode[b16_color_danger_fg]', $settings['dark_mode']['b16_color_danger_fg']) ?>
						</div>
					</div>
				</section>

			</article>
			<article class="b16-pane-settings-tab-pane" id="b16_pane_settings_tab_pane_4">
				<header class="b16-pane-settings-header">
					<label for="b16_pane_settings_tab_input-1">
						<span class="b16-button b16-button-primary" title="<?= lang('back') ?>">←</span>
					</label>
					<h2><?= lang('settings_title') ?></h2>
					<p></p>
				</header>
				<section>

					<h3><?= lang('auto_switch') ?></h3>
					<div class="row">
						<div class="form-group col c6">
							<label for="b16_color_mode"><?= lang('default_mode') ?></label>
							<?= form_select('b16_color_mode', [
								'auto' => lang('auto_mode'),
								'light' => lang('light_mode'),
								'dark' => lang('dark_mode'),
							], $settings['b16_color_mode']) ?>
							<p class="help-block"><?= lang('first_visit_mode') ?></p>
						</div>
						<div class="form-group col c6">
							<label for="b16_show_color_mode_switch"><?= lang('show_toggle_button') ?></label>
							<?= form_select('b16_show_color_mode_switch', [lang('no'), lang('yes')], $settings['b16_show_color_mode_switch']) ?>

							<p class="help-block"><?= lang('toggle_button_desc') ?></p>
						</div>
						<div class="form-group col c6">
							<label for="b16_switch_to_dark_time"><?= lang('dark_mode_time') ?></label>
							<input type="time" class="form-control" name="b16_switch_to_dark_time" id="b16_switch_to_dark_time" value="<?= $settings['b16_switch_to_dark_time'] ?>">
							<p class="help-block"><?= lang('dark_mode_hint') ?></p>
						</div>
						<div class="form-group col c6">
							<label for="b16_switch_to_light_time"><?= lang('light_mode_time') ?></label>
							<input type="time" class="form-control" name="b16_switch_to_light_time" id="b16_switch_to_light_time" value="<?= $settings['b16_switch_to_light_time'] ?>">
							<p class="help-block"><?= lang('light_mode_hint') ?></p>
						</div>
					</div>
					<h3><?= lang('custom_css') ?></h3>
					<div class="row">
						<div class="form-group col c12">
							<label for="b16_custom_css"><?= lang('custom_css_placeholder') ?></label>
							<?= form_textarea('b16_custom_css', $settings['b16_custom_css'], '100%', '50vmax') ?>
						</div>
					</div>
					<h3><?= lang('other_settings') ?></h3>
					<div class="row">
						<div class="form-group col c6">
							<label for="b16_inject_location"><?= lang('injection_position') ?></label>
							<?= form_select('b16_inject_location', ['body_start' => lang('head_position'), 'body_end' => lang('body_position')], $settings['b16_inject_location']) ?>
							<p class="help-block"><?= lang('injection_desc') ?></p>
						</div>

					</div>
				</section>
				<section>
					<h3><?= lang('knowledge_title') ?></h3>
					<h4><?= lang('contrast_levels') ?></h4>
					<p class="text-body"><?= lang('contrast_info') ?></p>
				</section>
				<section>
					<h3><?= lang('about_title') ?></h3>
					<dl>
						<dt><?= lang('author') ?></dt>
						<dd><?= $lang[$plugin.'author'] ?></dd>
						<dt><?= lang('thanks') ?></dt>
						<dd><a href="https://github.com/chriskempson/base16"> Chris Kempson's base16 on Github</a></dd>
						<dd><a href="https://github.com/samme/base16-styles">samme's base16-styles on Github</a></dd>
						<dd><a href="https://github.com/Rotekoppen/web16">Rotekoppen's web16 on GitHub</a></dd>
						<dd>DeepSeek - For demo page</dd>
						<dd><a href="https://fandom-of-idols.fandom.com/wiki/Nanase_Kurumi">Nanase Kurumi</a> - for keeping my sanity</dd>
					</dl>
				</section>
			</article>


		</form>
	</section>
	<section class="b16-pane-demo">
		<label for="b16-pane-demo-opened" class="b16-pane-demo-open-button">👀　　←</label>
	</section>
	
	<?= include __DIR__ . '/demo_template.php'; ?>

</section>
<script src="<?= str_replace(PATH_ROOT, getCurrentUrl(), PLUGIN_DIR) . $plugin . DS ?>view/js/b16_settings.js"></script>