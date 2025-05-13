/*=============================================
=                   实用函数                   =
=============================================*/

if (typeof (sRGBToLinearRGB) !== 'function') {
	/**  
	 * 将sRGB颜色转换为线性RGB颜色  
	 * @param {number} srgb sRGB颜色值（0-1）  
	 * @returns {number} 线性RGB颜色值  
	 */
	function sRGBToLinearRGB(srgb) {
		if (srgb <= 0.04045) {
			return srgb / 12.92;
		} else {
			return Math.pow((srgb + 0.055) / 1.055, 2.4);
		}
	}
}

if (typeof (getContrastRatio) !== 'function') {
	/**  
	 * 计算两个颜色的对比度比率  
	 * @param {string} colorHex1 第一个颜色的十六进制值  
	 * @param {string} colorHex2 第二个颜色的十六进制值  
	 * @returns {number} 对比度比率  
	 */
	function getContrastRatio(colorHex1, colorHex2) {
		// 将十六进制颜色转换为 RGB 数组  
		const color1 = hexToRgb(colorHex1);
		const color2 = hexToRgb(colorHex2);

		// 将sRGB转换到线性RGB  
		const linearRgb1 = {
			r: sRGBToLinearRGB(color1.r / 255),
			g: sRGBToLinearRGB(color1.g / 255),
			b: sRGBToLinearRGB(color1.b / 255)
		};
		const linearRgb2 = {
			r: sRGBToLinearRGB(color2.r / 255),
			g: sRGBToLinearRGB(color2.g / 255),
			b: sRGBToLinearRGB(color2.b / 255)
		};

		// 计算每种颜色的相对亮度（L）  
		const luminance1 = 0.2126 * linearRgb1.r + 0.7152 * linearRgb1.g + 0.0722 * linearRgb1.b;
		const luminance2 = 0.2126 * linearRgb2.r + 0.7152 * linearRgb2.g + 0.0722 * linearRgb2.b;

		// 计算对比度比率  
		let contrastRatio = (Math.max(luminance1, luminance2) + 0.05) / (Math.min(luminance1, luminance2) + 0.05);
		return Number(contrastRatio.toFixed(1)); // 返回一位小数的对比度比率  
	}
}
if (typeof (hexToRgb) !== 'function') {
	/**
	 * 将十六进制颜色转换为 RGB 数组
	 *
	 * @param {string} colorHex 十六进制颜色值
	 * @returns {object} RGB 数组
	 */
	function hexToRgb(colorHex) {
		// 去除十六进制颜色中的 # 符号
		colorHex = colorHex.replace('#', '');

		// 将十六进制颜色转换为 RGB 数组
		const rgb = {
			r: parseInt(colorHex.substring(0, 0 + 2), 16),
			g: parseInt(colorHex.substring(2, 2 + 2), 16),
			b: parseInt(colorHex.substring(4, 4 + 2), 16),
		};

		// 返回 RGB 数组
		return rgb;
	}
}


if (typeof (isContrastCompliantToWCAG) !== 'function') {
	/**  
	 * 检查对比度是否符合WCAG的AA级或AAA级标准  
	 * @param {number} contrastRatio 用getContrastRatio函数计算出来的两个颜色之间的对比度比率  
	 * @param {number} standard WCAG标准的比率，A级是3，AA级是4.5，AAA级是7  
	 * @returns {boolean} 如果对比度符合标准，则返回true；否则返回false  
	 * @example console.log(isContrastCompliantToWCAG(getContrastRatio("#000000", "#66ccff"))) is true
	 * @example console.log(isContrastCompliantToWCAG(getContrastRatio("#eeeeee", "#ffffff"))) is false
	 */
	function isContrastCompliantToWCAG(contrastRatio, standard = 4.5) {
		return contrastRatio >= standard;
	}
}
if (typeof (isContrastCompliantToWCAGToHumanFormat) !== 'function') {
	/**  
	 * 检查对比度是否符合WCAG的AA级或AAA级标准，并转换成易于理解的文字【用我】
	 * @param {number} contrastRatio 用getContrastRatio函数计算出来的两个颜色之间的对比度比率  
	 * @returns {string} 如果对比度符合标准，则返回true；否则返回false  
	 */
	function isContrastCompliantToWCAGToHumanFormat(contrastRatio) {
		let result = '';
		if (isContrastCompliantToWCAG(contrastRatio, 7)) {
			result = '👍 (' + contrastRatio + ')';
		} else if (isContrastCompliantToWCAG(contrastRatio, 4.5)) {
			result = '😊 (' + contrastRatio + ')';
		} else if (isContrastCompliantToWCAG(contrastRatio, 3)) {
			result = '🤔 (' + contrastRatio + ')';
		} else {
			result = '👎 (' + contrastRatio + ')';
		}
		return result;
	}
}
if (typeof (ucwords) !== 'function') {
	/**
	 * 将字符串中的每个单词首字母大写
	 * 来自PHP
	 *
	 * @param {string} inputString 输入字符串
	 * @returns {string} 输出字符串
	 */
	function ucwords(inputString) {
		let words = inputString.split(' ');
		let UCWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));
		return UCWords.join(' ');
	}
}
/*============  End of 实用函数  =============*/

/*=============================================
=                   业务函数                   =
=============================================*/

const b16_pane_demo_iframe = document.createElement('iframe');

// 设置iframe属性
b16_pane_demo_iframe.id = 'b16-pane-demo-iframe';
b16_pane_demo_iframe.width = '100%';
b16_pane_demo_iframe.height = '100%';

// 将iframe插入到DOM中
document.querySelector('.b16-pane-demo').appendChild(b16_pane_demo_iframe);

function getHomepageBodyHTML(demo = false) {
	if (demo) {
		var bodyContent = document.getElementById('b16-pane-demo-html').innerHTML;
		return bodyContent;
	} else {
		var xhr = new XMLHttpRequest();
		xhr.open('GET', '../', false);
		xhr.send(null);
		if (xhr.status === 200) {
			var htmlContent = xhr.responseText;
			console.log(htmlContent);
			if (htmlContent === null) {
				var bodyContent = document.getElementById('b16-pane-demo-html').innerHTML;
			} else {
				if (htmlContent.match(/<body>([\s\S]*?)<\/body>/i) === null) {
					var bodyContent = document.getElementById('b16-pane-demo-html').innerHTML;
				} else {
					var bodyContent = htmlContent.match(/<body>([\s\S]*?)<\/body>/i)[1];
				}
			}
			return bodyContent;
		} else {
			var bodyContent = document.getElementById('b16-pane-demo-html').innerHTML;
			return bodyContent;
		}
	}
}

function b16_write_demo_pane(content) {
	// 创建iframe内容的HTML字符串
	let b16_pane_demo_iframe_html_content = new Array(
		'<link href="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/bootstrap/4.6.1/css/bootstrap.css" type="text/css" rel="stylesheet" />',
		'<link href="../../plugin/till_base16_colorscheme/view/css/theme-base16.css" type="text/css" rel="stylesheet" id="theme_base16">',
		'<link rel="stylesheet" href="../../plugin/till_base16_colorscheme/view/css/base16/base16-default-dark.css" id="default_pallete_base16">',
		'<link href="../../plugin/till_base16_colorscheme/view/css/base16/base16-classic-dark.css" type="text/css" rel="stylesheet" id="pallete_setting_base16">',
		'<style id="preview_style_fixed">a{pointer-events:none}.selection{color: var(--bs-selection-fg,var(--base06));background-color: var(--bs-selection-bg,var(--base02));}</style>',
		'<style id="preview_style"></style>',
		content,
		'<script src="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/prettify/188.0.0/prettify.min.js" type="application/javascript"><\/script>',
		'<script>window.onload = function(){prettyPrint();}<\/script>'
	);

	// 使用iframe.contentWindow和iframe.contentDocument属性访问iframe内部窗口和文档对象
	b16_pane_demo_iframe.contentWindow.document.open();
	b16_pane_demo_iframe.contentWindow.document.write(b16_pane_demo_iframe_html_content.join('\n'));
	b16_pane_demo_iframe.contentWindow.document.close();
}

b16_write_demo_pane(getHomepageBodyHTML(true));

function b16_pane_demo_update_pallete(pallete = '') {
	let iframeStyle = b16_pane_demo_iframe.contentDocument.getElementById('pallete_setting_base16');
	iframeStyle.href = '../../plugin/till_base16_colorscheme/view/css/base16/base16-' + pallete + '.css';

}

function b16_pane_settings_update_pallete(pallete = '') {
	let mainStyle = document.getElementById('pallete_setting_base16');
	mainStyle.href = './plugin/till_base16_colorscheme/view/css/base16/base16-' + pallete + '.css';
}



function b16_pane_demo_update_css(cssRulesString = '') {
	let iframeStyle = b16_pane_demo_iframe.contentDocument.getElementById('preview_style');
	iframeStyle.innerHTML = cssRulesString;
}

function b16_pane_demo_build_css(b16_settings_data = {}) {
	let result = ':root{';

	for (let [key, value] of Object.entries(b16_settings_data)) {

		switch (key) {
			case 'b16_color_body_bg':
				result += '--bs-body-background-color: var(--' + value + '); '
				break;
			case 'b16_color_body_fg':
				result += '--bs-body-color: var(--' + value + '); '
				break;
			case 'b16_color_container_bg':
				result += '--bs-container-background-color: var(--' + value + '); '
				break;
			case 'b16_color_bright_fg':
				result += '--bs-body-color-bright: var(--' + value + '); '
				break;
			case 'b16_color_muted_fg':
				result += '--bs-body-muted-color: var(--' + value + '); '
				break;
			case 'b16_color_selection_bg':
				result += '--bs-selection-bg: var(--' + value + '); '
				break;
			case 'b16_color_selection_fg':
				result += '--bs-selection-fg: var(--' + value + '); '
				break;
			case 'b16_color_primary_bg':
				result += '--bs-primary: var(--' + value + '); '
				break;
			case 'b16_color_primary_fg':
				result += '--bs-primary-fg: var(--' + value + '); '
				break;
			case 'b16_color_secondary_bg':
				result += '--bs-secondary: var(--' + value + '); '
				break;
			case 'b16_color_secondary_fg':
				result += '--bs-secondary-fg: var(--' + value + '); '
				break;
			case 'b16_color_info_bg':
				result += '--bs-info: var(--' + value + '); '
				break;
			case 'b16_color_info_fg':
				result += '--bs-info-fg: var(--' + value + '); '
				break;
			case 'b16_color_success_bg':
				result += '--bs-success: var(--' + value + '); '
				break;
			case 'b16_color_success_fg':
				result += '--bs-success-fg: var(--' + value + '); '
				break;
			case 'b16_color_warning_bg':
				result += '--bs-warning: var(--' + value + '); '
				break;
			case 'b16_color_warning_fg':
				result += '--bs-warning-fg: var(--' + value + '); '
				break;
			case 'b16_color_danger_bg':
				result += '--bs-danger: var(--' + value + '); '
				break;
			case 'b16_color_danger_fg':
				result += '--bs-danger-fg: var(--' + value + '); '
				break;
			case 'b16_color_nav_bg':
				if (Number(b16_settings_data.b16_custom_nav_color) === 1) {
					result += '--bs-navbar-background-color: var(--' + value + '); '
				}
				break;
			case 'b16_color_nav_fg':
				if (Number(b16_settings_data.b16_custom_nav_color) === 1) {
					result += '--bs-navbar-color: var(--' + value + '); '
				}
				break;
			default:
				break;
		}
	}

	result += '}';
	return result;
}

var b16_settings_data = {
	"light_mode": {
		"b16_color_scheme": "classic-light",
		'b16_color_body_bg': 'base00',
		'b16_color_container_bg': 'base00',
		'b16_color_body_fg': 'base05',
		'b16_color_bright_fg': 'base06',
		'b16_color_muted_fg': 'base04',
		'b16_color_selection_bg': 'base0D',
		'b16_color_selection_fg': 'base00',
		'b16_color_primary_bg': 'base0D',
		'b16_color_primary_fg': 'base00',
		'b16_color_secondary_bg': 'base04',
		'b16_color_secondary_fg': 'base00',
		'b16_color_info_bg': 'base0C',
		'b16_color_info_fg': 'base00',
		'b16_color_success_bg': 'base0B',
		'b16_color_success_fg': 'base00',
		'b16_color_warning_bg': 'base0A',
		'b16_color_warning_fg': 'base06',
		'b16_color_danger_bg': 'base08',
		'b16_color_danger_fg': 'base00',
		'b16_custom_nav_color': false,
		'b16_color_nav_bg': 'base01',
		'b16_color_nav_fg': 'base05',
	},
	"dark_mode": {
		"b16_color_scheme": "classic-dark",
		'b16_color_body_bg': 'base00',
		'b16_color_container_bg': 'base00',
		'b16_color_body_fg': 'base05',
		'b16_color_bright_fg': 'base06',
		'b16_color_muted_fg': 'base04',
		'b16_color_selection_bg': 'base0D',
		'b16_color_selection_fg': 'base07',
		'b16_color_primary_bg': 'base0D',
		'b16_color_primary_fg': 'base07',
		'b16_color_secondary_bg': 'base03',
		'b16_color_secondary_fg': 'base07',
		'b16_color_info_bg': 'base0C',
		'b16_color_info_fg': 'base07',
		'b16_color_success_bg': 'base0B',
		'b16_color_success_fg': 'base07',
		'b16_color_warning_bg': 'base0A',
		'b16_color_warning_fg': 'base03',
		'b16_color_danger_bg': 'base08',
		'b16_color_danger_fg': 'base07',
		'b16_custom_nav_color': false,
		'b16_color_nav_bg': 'base01',
		'b16_color_nav_fg': 'base05',
	}
}

document.addEventListener('DOMContentLoaded', function () {
	var form = document.getElementById('b16-pane-settings-form');
	var inputs = form.querySelectorAll('input, textarea', 'select');

	inputs.forEach(function (input) {
		var input_name = new String(input.name).replace('-', '_');
		if (input_name.includes('[')) {
			input_name = input_name.split('[');
			input_name = input_name.map(item => item.replace(']', ''));
			if (input.checked) {
				b16_settings_data[input_name[0]][input_name[1]] = input.value;
				if (input_name[0] === 'light_mode' && input_name[1] === 'b16_color_scheme') {
					document.querySelectorAll(".light_mode_b16_color_scheme_selected").forEach(function (el) { el.innerText = ucwords(input.value.replace(/-/g, ' ')) });
				}
				if (input_name[0] === 'dark_mode' && input_name[1] === 'b16_color_scheme') {
					document.querySelectorAll(".dark_mode_b16_color_scheme_selected").forEach(function (el) { el.innerText = ucwords(input.value.replace(/-/g, ' ')) });
				}
			}

		} else {
			if (input.checked) {
				b16_settings_data[input_name] = input.value;
			}
		}
		setContrastResult();

	});

	inputs.forEach(function (input) {
		input.addEventListener('change', function () {
			var input_name = new String(input.name).replace('-', '_');
			if (input_name.includes('[')) {
				input_name = input_name.split('[');
				input_name = input_name.map(item => item.replace(']', ''));

				var b16_color_scheme_old = b16_settings_data[input_name[0]]['b16_color_scheme'];
				b16_settings_data[input_name[0]][input_name[1]] = input.value;



				b16_pane_demo_update_css(b16_pane_demo_build_css(b16_settings_data[input_name[0]]));
				if (input_name.includes('b16_color_scheme') && input.value !== b16_color_scheme_old) {
					b16_pane_demo_update_pallete(b16_settings_data[input_name[0]]['b16_color_scheme']);
					if (b16_settings_data['b16_pane_settings_tab_input'] === "2" || b16_settings_data['b16_pane_settings_tab_input'] === "3") {
						if (b16_settings_data['b16_pane_settings_tab_input'] === "2") {
							document.querySelectorAll(".light_mode_b16_color_scheme_selected").forEach(function (el) { el.innerText = ucwords(b16_settings_data[input_name[0]]['b16_color_scheme'].replace(/-/g, ' ')) });
						} else if (b16_settings_data['b16_pane_settings_tab_input'] === "3") {

							document.querySelectorAll(".dark_mode_b16_color_scheme_selected").forEach(function (el) { el.innerText = ucwords(b16_settings_data[input_name[0]]['b16_color_scheme'].replace(/-/g, ' ')) });
						}
						b16_pane_settings_update_pallete(b16_settings_data[input_name[0]]['b16_color_scheme']);
					}
				}

			} else {
				if (input_name.includes('b16_pane_settings_tab_input')) {
					switch (input.value) {
						case "2":
							console.log(input.value);
							b16_pane_demo_update_css(b16_pane_demo_build_css(b16_settings_data['light_mode']));
							b16_pane_demo_update_pallete(b16_settings_data['light_mode']['b16_color_scheme']);
							b16_pane_settings_update_pallete(b16_settings_data['light_mode']['b16_color_scheme']);
							break;
						case "3":
							b16_pane_demo_update_css(b16_pane_demo_build_css(b16_settings_data['dark_mode']));
							b16_pane_demo_update_pallete(b16_settings_data['dark_mode']['b16_color_scheme']);
							b16_pane_settings_update_pallete(b16_settings_data['dark_mode']['b16_color_scheme']);
							break;
						default:
							b16_pane_settings_update_pallete('default-light');
							break;
					}
				}

				b16_settings_data[input_name] = input.value;
			}
			setContrastResult();
			console.log('输入框的值已更改:', input.name, input.value);


		});
	});

	b16_pane_demo_update_css(b16_pane_demo_build_css(b16_settings_data));
});
/*============  End of 业务函数  =============*/

/*=============================================
=                   实用函数2                   =
=============================================*/

/**
 * 更新颜色对比度结果
 * @todo 一定有一种方法能用循环的方式解决这个
 */
function setContrastResult() {
	document.getElementById('b16_light_mode_color_body__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_container_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_body_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_light_mode_color_selection__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_selection_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_selection_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_light_mode_color_primary__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_primary_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_primary_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_light_mode_color_secondary__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_secondary_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_secondary_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_light_mode_color_info__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_info_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_info_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_light_mode_color_success__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_success_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_success_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_light_mode_color_warning__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_warning_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_warning_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_light_mode_color_danger__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_danger_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_danger_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_light_mode_color_nav__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_nav_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['light_mode']['b16_color_nav_fg']).replace(' ', '')
		)
	);

	document.getElementById('b16_dark_mode_color_body__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_container_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_body_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_dark_mode_color_selection__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_selection_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_selection_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_dark_mode_color_primary__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_primary_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_primary_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_dark_mode_color_secondary__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_secondary_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_secondary_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_dark_mode_color_info__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_info_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_info_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_dark_mode_color_success__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_success_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_success_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_dark_mode_color_warning__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_warning_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_warning_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_dark_mode_color_danger__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_danger_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_danger_fg']).replace(' ', '')
		)
	);
	document.getElementById('b16_dark_mode_color_nav__contrast_result').innerText = isContrastCompliantToWCAGToHumanFormat(
		getContrastRatio(
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_nav_bg']).replace(' ', ''),
			getComputedStyle(document.documentElement).getPropertyValue('--' + b16_settings_data['dark_mode']['b16_color_nav_fg']).replace(' ', '')
		)
	);
}

/*============  End of 实用函数2  =============*/
