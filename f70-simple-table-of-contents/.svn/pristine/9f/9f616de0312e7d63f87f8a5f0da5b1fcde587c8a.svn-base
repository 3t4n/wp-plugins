<?php
if( !class_exists( 'f70StocDisplay' ) ){
class f70StocDisplay {
/////////
	protected $content_str;
	
	public function __construct( $str ) {
		$this->content_str = $str;
	}
	
	function content() {
		global $post;
		
		//$this->content_str = そのページだけ
		//$post->post_content = 全体(ブロックタグも処理されてない)
		
		$val_on_off = get_post_meta( $post->ID, 'f70stoc_setting_on_off', true );
		if ( $val_on_off !== 'on' ) {
			return $this->content_str;
		}
		
		$val_headers = get_post_meta( $post->ID, 'f70stoc_setting_including_headers', true );
		if ( $val_headers == 'h2' ) {
			$add_h3 = false;
		} else {
			$add_h3 = true;
		}
		
		$table_str = $this->make_table( $this->content_str, $add_h3 );
		$content = $this->touch_anchor( $this->content_str );
		$content = preg_replace( '/(<span id=\"more-.*?\"><\/span>)/', "$1\n" . $table_str, $content);
		
		return $content;
	}
	
	
	function get_headings(){
		//見出しを配列化
		
		global $post;
		$headers = array();
		
		//h2が見つからない場合はスルー
		if ( strpos( $post->post_content, '<h2' ) === false ) {
			return $headers;
		}
		
		//行で分割
		$lines = explode( "\n", $post->post_content ); //$post->post_contentを使っとかないとページ分割された以降のアンカーが拾えないのであえてこうしている。
		
		if( empty( $lines ) ) {
			return $headers;
		}
		
		$page = 1;
		$j = 1;
		foreach ( $lines as $line ) {
			$array = array(
				'anchor_name' => '',
				'title_str'	=>	'',
				'head'	=>	'',
				'match_str' =>	'',
				'page'	=>	'',
			);
			
			//現在のページをカウント
			if ( strpos( $line, '<!--nextpage-->' ) !== false ) {
				$page ++;
				continue;
			}
			
			//見出しが行に出てきたら
			if( preg_match( '/<h[2|3].*?>(.*?)<\/h[2|3]>/', $line, $matches ) ) {
				
				//見出し情報を集める
				$array[ 'page' ] = $page;
				$array[ 'title_str' ] = $matches[1];
				$array[ 'match_str' ] = trim( $matches[0] );
				
				//stristr -> 大文字小文字含める
				if ( stristr( $matches[0], '<h2' ) !== FALSE ) {
					$array['head'] = 2;
				} elseif ( stristr( $matches[0], '<h3' ) !== FALSE ) {
					$array['head'] = 3;
				}
				
				//もともとidがついていたらそちらを使用
				if ( preg_match('/id=\"(.*?)\"/', $matches[0], $matches_id) ) {
					$array[ 'anchor_name' ] = $matches_id[1];
				} else {
					$array[ 'anchor_name' ] = 'index' . $j;
				}
				
				$headers[] = $array;
				$j ++;
				
			}
		}
		
		return $headers;
	}
	
	
	
	function make_table( $content, $add_h3 = true ) {
		//目次の作成
		global $post;
		
		//ヘッダーリストを取得
		$headers = $this->get_headings();
		if ( empty( $headers ) ) { return; }
		
		//見出し構造を整理
		$array_h2 = array();
		$array_h3 = array();
		$x = 0;
		$p = 0;
		foreach ( $headers as $header ) {
			if ( $header['head'] == 2 ) {
				$x ++;
				$array_h2[$x] = $header;
			}
			if ( $header['head'] == 3 ) {
				$array_h3[$x][] = $header;
			}
			$p ++;
		}
		
		//目次htmlを作成
		if ( !empty( $array_h2 ) ) {
			$y = 1;
			$i = 1;
			
			$add_class = '';
			if ( $add_h3 ) {
				$add_class = ' add_h3';
			}
			
			$mokuji_str = '<div id="f70stoc" class="table-of-contents' . $add_class . '"><span class="f70toc-header">' . __( 'Table of contents', 'f70-simple-table-of-contents' ) . '</span>';
			$mokuji_str .= '<ol>';
			foreach ( $array_h2 as $h2 ) {
				$link = $this->get_link( $h2 );
				$mokuji_str .= '<li><a href="' . $link . '">' . $h2[ 'title_str' ] . '</a>';
				
				$i ++;
				
				if ( !empty( $array_h3[$y] ) && $add_h3 ) {
					$h3ul = '<ol>';
					foreach ( $array_h3[$y] as $h3 ) {
						$link = $this->get_link( $h3 );
						$h3ul .= '<li><a href="' . $link . '">' . $h3['title_str'] . '</a></li>'."\n";
						$i ++;
					}
					$h3ul .= '</ol>';
					$mokuji_str .= $h3ul;
					$h3ul = '';
				}
				$mokuji_str .= '</li>'."\n";
				$y ++;
			}
			$mokuji_str .= '</ol></div>';
		}
		return $mokuji_str;
	}
	
	
	
	function touch_anchor( $content ) {
		global $post;
		
		$headers = $this->get_headings();
		if ( empty( $headers ) ) { return $content; }
		
		//アンカーを付与
		foreach ( $headers as $header ) {
			if ( preg_match ( '/^index/', $header['anchor_name'] ) ) {
				
				//置き換え元タイトルを作成
				$replace_from = $header[ 'match_str' ];
					//wp-block-heading がない場合にアンカーがつけられない問題に対処
				if ( strpos( $header[ 'match_str' ], 'wp-block-heading' ) === false ) {
					if ( strpos( $header[ 'match_str' ], 'class="' ) !== false ) {
						$replace_from = str_replace( 'class="', 'class="wp-block-heading ', $replace_from );
					} else {
						$replace_from = str_replace( '<h' . $header[ 'head' ], '<h' . $header[ 'head' ] . ' class="wp-block-heading"', $replace_from );
					}
				}
				
				//置き換え先タイトルを作成
				$replace_to = preg_replace( '/(<h.*?)>/', "$1" . ' id="' . $header['anchor_name'] . '">', $replace_from . "\n" );
				
				//置き換え実行
				$content = preg_replace( '/' . preg_quote( $replace_from, '/' ) . '/', $replace_to, $content, 1 );
			}
		}
		return $content;
		
	}
	
	
	
	function get_link( $header ) {
		//リンクURLを決定
		
		if( $header[ 'page' ] <= 1 ){
			//1ページ目 : アンカーだけ返す
			return '#' . $header[ 'anchor_name' ];
			
		} else {
			//2ページ目以降の場合
			
			//パーマリンク構造が「基本」のとき
			if ( ! get_option( 'permalink_structure' ) ) {
				return add_query_arg( 'page', $header[ 'page' ], get_permalink() ) . '#' . $header[ 'anchor_name' ];
			} else {
				//スラッシュ付きのとき
				return trailingslashit( get_permalink() ) . $header[ 'page' ] . '#' . $header[ 'anchor_name' ];
			}
			
		}
	}

/////////
}
}