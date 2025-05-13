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
							<label for="b16_show_color_mode_switch"><?= lang('firsshow_toggle_button_visit_mode') ?></label>
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

	<template id="b16-pane-demo-html">
		<header>
			<nav class="navbar navbar-expand navbar-dark bg-dark">
				<a class="navbar-brand" href="#">Demo</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDark" aria-controls="navbarNavDark" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDark">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="#">Archive</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- Hero Section -->
		<section class="jumbotron">
			<div class="container">
				<h1 class="display-4">Hello, I'm Jane Doe!</h1>
				<p class="lead">This is a example page</p>
			</div>
		</section>

		<!-- About Section -->
		<section class="section">
			<div class="container">
				<div class="card">
					<div class="card-body">
						<h2 class="mb-4">A Little About Me</h2>
						<p>If you've ever wondered what would happen if a dictionary had a baby with a <mark>stand-up comedian</mark>, wonder no more. That's basically my personality.</p>
						<p>I blog about life's absurdities, tech that makes me scream (in a good way), and coffee - lots and lots of coffee. My mission? To make you snort-laugh while learning something useful. <span class="text-muted">Or at least distract you from your Monday blues.</span></p>
					</div>
				</div>
			</div>
		</section>

		<!-- Blog Section -->
		<section class="section">
			<div class="container">
				<div class="text-center my-3">
					<h2>Latest Posts</h2>
					<p><code>Warning: May contain excessive emojis and questionable life choices</code></p>
				</div>
				<div class="row">
					<div class="col-md-4 mb-4">
						<div class="card h-100 shadow-sm">
							<img src="https://placehold.co/300x200 " class="card-img-top" alt="Blog Post 1" loading="lazy" />
							<div class="card-body">
								<h5 class="card-title">How I Tried to Conquer Mount Laundry</h5>
								<p class="card-text">Spoiler: The laundry won. Again.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-4">
						<div class="card h-100 shadow-sm">
							<img src="https://placehold.co/300x200 " class="card-img-top" alt="Blog Post 2" loading="lazy" />
							<div class="card-body">
								<h5 class="card-title">The Day My WiFi Broke and Humanity Lost Hope</h5>
								<p class="card-text">One woman's journey through digital darkness.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-4">
						<div class="card h-100 shadow-sm">
							<img src="https://placehold.co/300x200 " class="card-img-top" alt="Blog Post 3" loading="lazy" />
							<div class="card-body">
								<h5 class="card-title">Top 10 Cat Memes That Explain HTML Error Codes</h5>
								<p class="card-text">Because apparently cats know us better than we know ourselves.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Contact Section -->
		<section class="section">
			<div class="container-fluid">

				<div class="card">
					<div class="card-header">
						<h2>Let's Get Social</h2>
						<p class="mb-0">I promise not to spam you...</p>
					</div>

					<div class="social-icons card-body text-center">
						<button type="button" class="btn btn-primary">Primary</button>
						<button type="button" class="btn btn-secondary">Secondary</button>
						<button type="button" class="btn btn-success">Success</button>
						<button type="button" class="btn btn-danger">Danger</button>
						<button type="button" class="btn btn-warning">Warning</button>
						<button type="button" class="btn btn-info">Info</button>
						<button type="button" class="btn btn-light">Light</button>
						<button type="button" class="btn btn-dark">Dark</button>
					</div>
					<div class="social-icons card-body text-center">
						<button type="button" class="btn btn-outline-primary">Primary</button>
						<button type="button" class="btn btn-outline-secondary">Secondary</button>
						<button type="button" class="btn btn-outline-success">Success</button>
						<button type="button" class="btn btn-outline-danger">Danger</button>
						<button type="button" class="btn btn-outline-warning">Warning</button>
						<button type="button" class="btn btn-outline-info">Info</button>
						<button type="button" class="btn btn-outline-light">Light</button>
						<button type="button" class="btn btn-outline-dark">Dark</button>
					</div>
					<div class="card-footer">

						<p>Or fill in this form: </p>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<button class="btn btn-primary" type="button">Submit</button>
					</div>

				</div>

			</div>

		</section>

		<!-- Footer -->
		<footer class="footer p-4">
			<p>&copy; 2025 Jane Doe</p>
			</div>
		</footer>

	</template>
</section>
<script src="<?= str_replace(PATH_ROOT, getCurrentUrl(), PLUGIN_DIR) . $plugin . DS ?>view/js/b16_settings.js"></script>