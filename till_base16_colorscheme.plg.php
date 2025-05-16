<?php defined('FLATBOARD') or die('Flatboard Community.');
/**
 * Base16 Color scheme adapter
 *
 * @author         Tillreetree
 * @copyright      2025 Tillreetree
 * @license        http://opensource.org/licenses/MIT
 * @package        FlatBoard
 * @version        1.0.2
 * @update         2025-05-15
 */

/*=============================================
=                   Définition variables                   =
=============================================*/

$BASE16_ALL_COLOR_SCHEMES = [];

$BASE16_ALL_COLOR_SCHEMES += include_once(PLUGIN_DIR . 'till_base16_colorscheme' . DS . 'view/css/base16/_get_all.php');

/*============  End of Définition variables  =============*/

/*=============================================
=                   Fonctions utilitaires                   =
=============================================*/

/**
 * Sélecteur de couleur Base16
 * @param string $id ID du champ de formulaire
 * @param int|string $current Valeur actuellement sélectionnée
 * @return string HTML du sélecteur
 */
function form_b16_color_selector($id = '', $current = '0') {
    $r = '<div class="b16-color-selector">';
    $current = str_replace('base0', '', $current);
    $current_int = intval(base_convert(strval($current), 16, 10));
    for ($i = 0; $i <= 15; $i++) {
        $this_base = 'base0' . strtoupper(base_convert(strval($i), 10, 16));
        $this_checked = $current_int === $i ? ' checked ' : '';
        $r .= '<input type="radio" name="' . $id . '" value="' . $this_base . '" class="b16-color-selector-input" id="' . $id . '-' . $this_base . '" ' . $this_checked . '><label for="' . $id . '-' . $this_base . '" class="b16-color-selector-button fg-' . $this_base . '">' . strtoupper(base_convert(strval($i), 10, 16)) . '</label>';
    }
    $r .= '</div>';
    return $r;
}

/**
 * Sélecteur de schéma de couleur Base16
 * @param string $id ID du champ de formulaire
 * @param int|string $current Valeur actuellement sélectionnée
 * @return string HTML du sélecteur
 */
function form_b16_color_scheme_selector($id = '', $current = 'default-dark') {
    global $BASE16_ALL_COLOR_SCHEMES;
    $r = '<div class="b16-color-scheme-selector">';
    foreach ($BASE16_ALL_COLOR_SCHEMES as $key => $value) {
        $new_key = str_replace(['base16-', '.css'], ['', ''], $key);
        $this_checked = $current === $new_key ? ' checked ' : '';
        $this_label_add = '';

        $r .= '<input type="radio" name="' . $id . '" value="' . $new_key . '" class="b16-color-scheme-input" id="' . $id . '--' . $new_key . '" ' . $this_checked . '>
        <label for="' . $id . '--' . $new_key . '" class="b16-color-scheme-button">
        <img src="' . HTML_BASEPATH . DS . $value['image'] . '" alt="' . $value['label'] . '" loading="lazy">
        ' . $this_label_add . ' ' . $value['label'] . '
        </label>';
    }
    $r .= '</div>';

    return $r;
}

/**
 * Récupère la valeur d'une clé de langue
 * @param string $key Clé de langue
 * @return string Valeur traduite ou placeholder si non trouvée
 */
function lang($key = '') {
    global $lang;
    return isset($lang[$key]) ? $lang[$key] : 'lang[' . $key . ']';
}

/**
 * Récupère l'URL courante du site
 * @return string URL base
 */
function getCurrentUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];

    // Récupère le chemin du répertoire du script (sans PATH_INFO)
    $scriptDir = dirname($_SERVER['SCRIPT_NAME']);

    // Assure que le chemin se termine par un slash
    $basePath = rtrim($scriptDir, '/');

    // Construit l'URL complète
    return $protocol . '://' . $host . $basePath;
}

/**
 * Génère un bouton radio Oui/Non
 * @param string $name Nom du champ
 * @param int $checked Valeur sélectionnée par défaut
 * @return string HTML des boutons radio
 */
function form_radio_yes_no($name, $checked = 0) {
    $checked = intval($checked);
    return form_radio($name, array(1 => lang('yes'), 0 => lang('no')), $checked);
}

/**
 * Génère des boutons radio à partir d'un tableau d'options
 * @param string $name Nom du champ
 * @param array $arr Options sous forme clé => valeur
 * @param mixed $checked Valeur sélectionnée par défaut
 * @return string HTML des boutons radio
 */
function form_radio($name, $arr, $checked = 0) {
    empty($arr) && $arr = array(lang('no'), lang('yes'));
    $s = '';

    foreach ((array)$arr as $k => $v) {
        $add = $k == $checked ? ' checked="checked"' : '';
        $s .= "<label class=\"custom-input custom-radio\"><input type=\"radio\" name=\"$name\" value=\"$k\"$add /> $v</label> &nbsp; \r\n";
    }
    return $s;
}

/**
 * Génère un menu déroulant
 * @param string $name Nom du champ
 * @param array $arr Options sous forme clé => valeur
 * @param mixed $checked Valeur sélectionnée par défaut
 * @param bool|string $id ID du champ
 * @return string HTML du menu déroulant
 */
function form_select($name, $arr, $checked = 0, $id = TRUE) {
    if (empty($arr)) return '';
    $idadd = $id === TRUE ? "id=\"$name\"" : ($id ? "id=\"$id\"" : '');
    $s = "<select name=\"$name\" class=\"custom-select\" $idadd> \r\n";
    $s .= form_options($arr, $checked);
    $s .= "</select> \r\n";
    return $s;
}

/**
 * Génère les options d'un menu déroulant
 * @param array $arr Options sous forme clé => valeur
 * @param mixed $checked Valeur sélectionnée par défaut
 * @return string HTML des options
 */
function form_options($arr, $checked = 0) {
    $s = '';
    foreach ((array)$arr as $k => $v) {
        $add = $k == $checked ? ' selected="selected"' : '';
        $s .= "<option value=\"$k\"$add>$v</option> \r\n";
    }
    return $s;
}

/**
 * Génère un champ de texte multiligne
 * @param string $name Nom du champ
 * @param string $value Contenu initial
 * @param bool|string $width Largeur du champ
 * @param bool|string $height Hauteur du champ
 * @return string HTML du champ
 */
function form_textarea($name, $value, $width = FALSE, $height = FALSE) {
    $style = '';
    if ($width !== FALSE) {
        is_numeric($width) and $width .= 'px';
        is_numeric($height) and $height .= 'px';
        $style = " style=\"width: $width; height: $height; \"";
    }
    $s = "<textarea name=\"$name\" id=\"$name\" class=\"form-control\" $style>$value</textarea>";
    return $s;
}

/*============  End of Fonctions utilitaires  =============*/


/*=============================================
=                   Code métier                   =
=============================================*/

/**
 * Installation du plugin
 * Appelé automatiquement lors de l'activation du plugin
 * @return void
 */
function till_base16_colorscheme_install() {
    $plugin = 'till_base16_colorscheme';
    global $BASE16_ALL_COLOR_SCHEMES;

    // Vérifie si le plugin est déjà installé
    if (flatDB::isValidEntry('plugin', $plugin)) {
        return; // Si le plugin est déjà installé, ne rien faire
    }

    $BASE16_BEST_COLOR_SCHEME_PAIRS = [
        ['light' => 'atelier-cave-light',             'dark' => 'atelier-cave',],
        ['light' => 'atelier-dune-light',             'dark' => 'atelier-dune',],
        ['light' => 'atelier-estuary-light',          'dark' => 'atelier-estuary',],
        ['light' => 'atelier-forest-light',           'dark' => 'atelier-forest',],
        ['light' => 'atelier-heath-light',            'dark' => 'atelier-heath',],
        ['light' => 'atelier-lakeside-light',         'dark' => 'atelier-lakeside',],
        ['light' => 'atelier-plateau-light',          'dark' => 'atelier-plateau',],
        ['light' => 'atelier-savanna-light',          'dark' => 'atelier-savanna',],
        ['light' => 'atelier-seaside-light',          'dark' => 'atelier-seaside',],
        ['light' => 'atelier-sulphurpool-light',      'dark' => 'atelier-sulphurpool',],
        ['light' => 'brushtrees',                     'dark' => 'brushtrees-dark',],
        ['light' => 'ayu-light',                      'dark' => 'ayu-dark',],
        ['light' => 'ayu-light',                      'dark' => 'ayu-mirage',],
        ['light' => 'catppuccin-latte',               'dark' => 'catppuccin-frappe',],
        ['light' => 'catppuccin-latte',               'dark' => 'catppuccin-macchiato',],
        ['light' => 'catppuccin-latte',               'dark' => 'catppuccin-mocha',],
        ['light' => 'classic-light',                  'dark' => 'classic-dark',],
        ['light' => 'cupcake',                        'dark' => 'rose-pine-moon',],
        ['light' => 'danqing-light',                  'dark' => 'danqing',],
        ['light' => 'equilibrium-light',              'dark' => 'equilibrium-dark',],
        ['light' => 'equilibrium-gray-light',         'dark' => 'equilibrium-gray-dark',],
        ['light' => 'everforest-terminal-light',      'dark' => 'everforest-terminal',],
        ['light' => 'gruvbox-light-hard',             'dark' => 'gruvbox-dark-hard',],
        ['light' => 'gruvbox-light-medium',           'dark' => 'gruvbox-dark-medium',],
        ['light' => 'gruvbox-light-soft',             'dark' => 'gruvbox-dark-soft',],
        ['light' => 'gruvbox-material-light-hard',    'dark' => 'gruvbox-material-dark-hard',],
        ['light' => 'gruvbox-material-light-medium',  'dark' => 'gruvbox-material-dark-medium',],
        ['light' => 'gruvbox-material-light-soft',    'dark' => 'gruvbox-material-dark-soft',],
        ['light' => 'harmonic16-light',               'dark' => 'harmonic16-dark',],
        ['light' => 'horizon-terminal-light',         'dark' => 'horizon-terminal-dark',],
        ['light' => 'mikuconsole-normal-light',       'dark' => 'mikuconsole-normal-dark',],
        ['light' => 'one-light',                      'dark' => 'one-dark',],
        ['light' => 'rose-pine-dawn',                 'dark' => 'rose-pine',],
        ['light' => 'rose-pine-dawn',                 'dark' => 'stella',],
        ['light' => 'silk-light',                     'dark' => 'silk-dark',],
        ['light' => 'solarized-light',                'dark' => 'solarized-dark',],
    ];
    $BASE16_BEST_COLOR_SCHEME_PAIRS_PICK = $BASE16_BEST_COLOR_SCHEME_PAIRS[array_rand($BASE16_BEST_COLOR_SCHEME_PAIRS)];

    $settings = array(
        // FORCE
        $plugin . 'state' => false,

        // PLUGIN
        'light_mode' => array(
            'b16_color_scheme' => $BASE16_BEST_COLOR_SCHEME_PAIRS_PICK['light'],
            'b16_color_scheme_href' => str_replace(PATH_ROOT, getCurrentUrl(), PLUGIN_DIR) . $plugin . DS . 'view/css/base16/base16-' . $BASE16_BEST_COLOR_SCHEME_PAIRS_PICK['light'] . '.css',
            'b16_color_body_bg' => 'base00',
            'b16_color_container_bg' => 'base00',
            'b16_color_body_fg' => 'base05',
            'b16_color_bright_fg' => 'base06',
            'b16_color_muted_fg' => 'base04',
            'b16_color_selection_bg' => 'base0D',
            'b16_color_selection_fg' => 'base00',
            'b16_color_primary_bg' => 'base0D',
            'b16_color_primary_fg' => 'base00',
            'b16_color_secondary_bg' => 'base04',
            'b16_color_secondary_fg' => 'base00',
            'b16_color_info_bg' => 'base0C',
            'b16_color_info_fg' => 'base00',
            'b16_color_success_bg' => 'base0B',
            'b16_color_success_fg' => 'base00',
            'b16_color_warning_bg' => 'base0A',
            'b16_color_warning_fg' => 'base06',
            'b16_color_danger_bg' => 'base08',
            'b16_color_danger_fg' => 'base00',
            'b16_custom_nav_color' => false,
            'b16_color_nav_bg' => 'base01',
            'b16_color_nav_fg' => 'base05',
        ),
        'dark_mode' => array(
            'b16_color_scheme' => $BASE16_BEST_COLOR_SCHEME_PAIRS_PICK['dark'],
            'b16_color_scheme_href' => str_replace(PATH_ROOT, getCurrentUrl(), PLUGIN_DIR) . $plugin . DS . 'view/css/base16/base16-' . $BASE16_BEST_COLOR_SCHEME_PAIRS_PICK['dark'] . '.css',
            'b16_color_body_bg' => 'base00',
            'b16_color_container_bg' => 'base00',
            'b16_color_body_fg' => 'base05',
            'b16_color_bright_fg' => 'base06',
            'b16_color_muted_fg' => 'base04',
            'b16_color_selection_bg' => 'base0D',
            'b16_color_selection_fg' => 'base07',
            'b16_color_primary_bg' => 'base0D',
            'b16_color_primary_fg' => 'base07',
            'b16_color_secondary_bg' => 'base03',
            'b16_color_secondary_fg' => 'base07',
            'b16_color_info_bg' => 'base0C',
            'b16_color_info_fg' => 'base07',
            'b16_color_success_bg' => 'base0B',
            'b16_color_success_fg' => 'base07',
            'b16_color_warning_bg' => 'base0A',
            'b16_color_warning_fg' => 'base03',
            'b16_color_danger_bg' => 'base08',
            'b16_color_danger_fg' => 'base07',
            'b16_custom_nav_color' => false,
            'b16_color_nav_bg' => 'base01',
            'b16_color_nav_fg' => 'base05',
        ),
        'b16_color_mode' => 'auto',
        'b16_show_color_mode_switch' => true,
        'b16_switch_to_dark_time' => '20:00',
        'b16_switch_to_light_time' => '07:00',
        'b16_inject_location' => 'body_start',
        'b16_custom_css' => '',
    );

    try {
        // Sauvegarde les réglages dans un fichier de données spécifique au plugin
        $dataPath = Plugin::getPluginDBPath($plugin);
        flatDB::saveEntry('plugin', $plugin, $settings);
    } catch (InvalidArgumentException $e) {
        // Gestion des erreurs
        error_log("Erreur lors de l'installation du plugin $plugin: " . $e->getMessage());
    }
}

/**
 * Configuration du plugin
 * Appelé par Flatboard lors de l'accès à la page de configuration
 * @return string HTML de la page de configuration
 */
function till_base16_colorscheme_config() {
    /*=============================================
    =                   Préparation                   =
    =============================================*/
    global $lang, $token, $BASE16_ALL_COLOR_SCHEMES;

    $plugin = 'till_base16_colorscheme';
    $FORM_ACTION = 'config.php' . DS . 'plugin' . DS . $plugin;
    
    try {
        // Récupère les paramètres du plugin
        if (flatDB::isValidEntry('plugin', $plugin)) {
            $settings = flatDB::readEntry('plugin', $plugin);
        } else {
            // Si le plugin n'est pas encore configuré, l'installer maintenant
            till_base16_colorscheme_install();
            $settings = flatDB::readEntry('plugin', $plugin);
        }
        
        $SettingPageHTML = '';

        /*============  End of Préparation  =============*/

        if (!empty($_POST) && CSRF::check($token)) {
            /* REQUÊTE POST
            -------------------------------------------------- */

            $settings['b16_color_mode'] = $_POST['b16_color_mode'] ?? '';
            $settings['b16_show_color_mode_switch'] = $_POST['b16_show_color_mode_switch'] ?? false;
            $settings['b16_switch_to_dark_time'] = $_POST['b16_switch_to_dark_time'] ?? '';
            $settings['b16_switch_to_light_time'] = $_POST['b16_switch_to_light_time'] ?? '';
            $settings['b16_inject_location'] = $_POST['b16_inject_location'] ?? '';
            $settings['b16_custom_css'] = htmlspecialchars($_POST['b16_custom_css']) ?? '';
            
            foreach ($_POST['light_mode'] as $key => $value) {
                $settings['light_mode'][$key] = $value;
            }
            
            foreach ($_POST['dark_mode'] as $key => $value) {
                $settings['dark_mode'][$key] = $value;
            }
            
            $settings['light_mode']['b16_color_scheme_href'] = $BASE16_ALL_COLOR_SCHEMES['base16-' . $settings['light_mode']['b16_color_scheme'] . '.css']['href'];
            $settings['dark_mode']['b16_color_scheme_href'] = $BASE16_ALL_COLOR_SCHEMES['base16-' . $settings['dark_mode']['b16_color_scheme'] . '.css']['href'];

            // Sauvegarde des paramètres
            flatDB::saveEntry('plugin', $plugin, $settings);

            // Affiche un message de confirmation avec redirection
            $SettingPageHTML .= Plugin::redirectMsg(
                $lang['data_save'],
                'config.php' . DS . 'plugin' . DS . $plugin,
                $lang['plugin'] . '&nbsp;<b>' . $lang[$plugin . 'name'] . '</b>'
            );

            /* Fin de REQUÊTE POST
            -------------------------------------------------- */
        } else {
            /* REQUÊTE GET
            -------------------------------------------------- */

            $SettingPageHTML .= include_once(PLUGIN_DIR . $plugin . DS . 'setting.php');

            /* Fin de REQUÊTE GET
            -------------------------------------------------- */
        }
    } catch (Exception $e) {
        // Gestion des erreurs avec message d'erreur approprié
        $SettingPageHTML = '<div class="alert alert-danger"><strong>Erreur:</strong> ' . $e->getMessage() . '</div>';
    }

    return $SettingPageHTML;
}

/**
 * Hook exécuté avant le chargement principal
 * Utilisé pour charger les assets CSS/JS nécessaires
 * @return void
 */
function till_base16_colorscheme_beforeMain() {
    if (Plugin::isValidHook('beforeMain', 'till_base16_colorscheme')) {
        $plugin = 'till_base16_colorscheme';
        include_once(PLUGIN_DIR . $plugin . DS . 'hook' . DS . 'beforeMain.php');
    }
}

/**
 * Hook exécuté pour ajouter du JavaScript en pied de page
 * @return void
 */
function till_base16_colorscheme_footerJS() {
    if (Plugin::isValidHook('footerJS', 'till_base16_colorscheme')) {
        $plugin = 'till_base16_colorscheme';
        include_once(PLUGIN_DIR . $plugin . DS . 'hook' . DS . 'footerJS.php');
    }
}

/**
 * Hook exécuté dans la section head de la page
 * @return void
 */
function till_base16_colorscheme_head() {
    if (Plugin::isValidHook('head', 'till_base16_colorscheme')) {
        $plugin = 'till_base16_colorscheme';
        include_once(PLUGIN_DIR . $plugin . DS . 'hook' . DS . 'head.php');
    }
}

/*============  End of Code métier  =============*/