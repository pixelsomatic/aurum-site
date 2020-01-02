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
define( 'DB_NAME', 'aurum' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'Kris1993' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Q:D2:J`%vpByKFq*UCYwmk!6VqMVJGt];5@uf(bXhVr,4#X`fyH .dXxnw=`}r+[' );
define( 'SECURE_AUTH_KEY',  '?t!S?o)R3YycG_uZf+D$%(tBK wg*TEV{6WiAwv5dpgpI2Tgw[s0HM%wG839ap-(' );
define( 'LOGGED_IN_KEY',    '&<MlQB_2fJ^xR/&kSRpk!4tZf8dPjV6Fu:w[R(CT3 M&G@W!{0,QtO6uo&Zz[Doe' );
define( 'NONCE_KEY',        't:Ec`.uPl0F3Q]-l!(W)f=0F{5_`w4/1DZghO1j6d<;xhzqSwx)_V{r{D9.u8^#9' );
define( 'AUTH_SALT',        '0Tnje5d`.XlS7HU|r(j/dQ&p]w*J2G|*XbALd:+GI}35Ql=:%ebHa[KRw?1#:-`t' );
define( 'SECURE_AUTH_SALT', 'lI5DHE:#`|z|,8*{]y _>GPNi)pih2Md=tVgl%AECKx[Qb]]Ah!3?0E_rd;3)Hoo' );
define( 'LOGGED_IN_SALT',   'P272%OxdowQ{+oIOhqWLAmF*Ca>{7=hEtV=R?nhh{]BY{mkqpqgq4ZY^/,EQ9u%H' );
define( 'NONCE_SALT',       'EvY /L;D7n&$2{lP83N[D(*zE</QCLGa#yB`0BS;g,}?:Une.fG$Hf?i+8kF=bUn' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

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

