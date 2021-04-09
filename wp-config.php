<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'u590376853_teste');


/** Usuário do banco de dados MySQL */
define('DB_USER', 'u590376853_marce');


/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '@alisson96');


/** Nome do host do MySQL */
define('DB_HOST', 'mysql.hostinger.com');


/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');


/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cjWRyJDj8U/1~p]oukMN^mQ`zv}6nB87M[>>&s;Vqq-{$ZcP9Ez{YpEWBPfwKGtu');

define('SECURE_AUTH_KEY',  'aML=0tCxH0TW$(y@V3x~5nd-DMaCH6WXHP|6X^E@9ac+DDtaxVs$C,Rw+_@TBwye');

define('LOGGED_IN_KEY',    '=| g[IPPFq&nXK@)jwl^Zl45i:7g,h5},yNyO93!zjOAejCkP43NV)[s>rQ.%<J;');

define('NONCE_KEY',        'yJyVPoRX[F!b_(BqAwP6P/Z#>o4}Ml.eznSXxfP I<nw)UZC*{yT_?zBAQs+_!^T');

define('AUTH_SALT',        'r>oTHIjSw[UTmmo|u~HutH3P=i]OUh$Pe=a32=>*(-l,-ed| zx~>?| wu%-kfu}');

define('SECURE_AUTH_SALT', 'CD2dEy2ALgWcs`cPZD[s%lNyXEW8B%X~~.Bi%K)VZ#H2v)Nfq|1I/tf)CB~mx(b8');

define('LOGGED_IN_SALT',   'GtB<xD.9):TC;Z[ic~2lo|b?ZoX~cx2`e67Qf@#q):fiW2+&HuYZ:fyAtWFNe]_U');

define('NONCE_SALT',       'CY#])&{~:`_76z9[+;VSuM8[)Jjy(vajNND:|x8-yU@RsJVq6`I0Rpkq,:3;+0RN');


/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
