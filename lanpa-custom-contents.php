<?php
/*
Plugin Name:Lanpa custom contents
Plugin URI: http://www.teamfactory.co.jp/wp/
Description: Lanpa Custom Contents plugin works only in Lanpa WordPress Theme. You can not use it for others. This plugin helps you to build a original Landing Page by adding and editting required sections. For example, You can add and edit "Solution", "Reason" and "Testimonials" sections with this plugin, which will be necessary for your Landing page. Enjoy editting texts, colors and iamges as you like.
Version: 1.0.0
Author: Team Factory
Author URI: http://www.teamfactory.co.jp/

Copyright 25.04.2016 Team Factory
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/




function lccm_add_styles() {
	wp_enqueue_style( 'lccm_style', plugins_url( "css/style.css", __FILE__ ) );
	
	wp_enqueue_script( 'lccm_script', plugins_url( "lanpa-custom-contents/js/script.js"), array( 'jquery' ), true );
}
add_action( 'admin_enqueue_scripts', 'lccm_add_styles' );





class LccShowText {
	function __construct() {
		add_action('admin_menu', array($this, 'lcc_add_pages'));
	}
	function lcc_add_pages() {
		add_theme_page('Lanpa','Lanpa', 'edit_themes', __FILE__, array($this,'lcc_show_text_option_page'), '', 26);
	}
	function lcc_show_text_option_page() {
		if ( isset($_POST['lcc_showtext_options'])) {
			check_admin_referer('shoptions');
			$opt = $_POST['lcc_showtext_options'];
			update_option('lcc_showtext_options', $opt);
?>

	<div class="updated fade">
		<p><strong><?php _e('Options saved.', 'lanpa'); ?></strong></p>
	</div>
	<?php
		}
?>
		<div class="wrap tabs">
			<div id="icon-options-general" class="icon32">
				<br>
			</div>
			<h1>Lanpa Custom Section</h1>
            <p><?php _e( 'You can add and edit "Solution", "Reason" and "Testimonials" sections which are supposed to be necessary for Landing page with this plugin. You can edit texts easily, and also change colors and images.', 'lanpa' ) ?></p>
			<h2 class="nav-tab-wrapper">
				<label for="solution" class="solution"><span class="nav-tab nav-tab-active">Solution</span></label>
			
				<label for="reason" class="reason"><span class="nav-tab">Reason</span></label>
				
				<label for="testimonials" class="testimonials"><span class="nav-tab">Testimonials</span></label>
			</h2>
			<form action="" method="post">
				<?php
		wp_nonce_field('shoptions');
		$opt = get_option('lcc_showtext_options');
		//Reasons title
		$lcc_support_title = isset($opt['support_title']) ? $opt['support_title']: __( 'Reasons' , 'lanpa');
		//Section01
		$lcc_support_section01_text01 = isset($opt['section01_text01']) ? $opt['section01_text01']: __( 'Reason 1', 'lanpa');
		$lcc_support_section01_text02 = isset($opt['section01_text02']) ? $opt['section01_text02']: __( 'Reason 1', 'lanpa');
		$lcc_support_section01_text03 = isset($opt['section01_text03']) ? $opt['section01_text03']: __( 'Summarize Reason 1', 'lanpa' );
		$lcc_support_section01_text04 = isset($opt['section01_text04']) ? $opt['section01_text04']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
		$lcc_support_section01_text05 = isset($opt['section01_text05']) ? $opt['section01_text05']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
		//Section02
		$lcc_support_section02_text01 = isset($opt['section02_text01']) ? $opt['section02_text01']: __( 'Reason 2', 'lanpa' );
		$lcc_support_section02_text02 = isset($opt['section02_text02']) ? $opt['section02_text02']: __( 'Reason 2', 'lanpa' );
		$lcc_support_section02_text03 = isset($opt['section02_text03']) ? $opt['section02_text03']: __('Summarize Reason 2' , 'lanpa');
		$lcc_support_section02_text04 = isset($opt['section02_text04']) ? $opt['section02_text04']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
		$lcc_support_section02_text05 = isset($opt['section02_text05']) ? $opt['section02_text05']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
		//Section03
		$lcc_support_section03_text01 = isset($opt['section03_text01']) ? $opt['section03_text01']: __( 'Reason 3', 'lanpa' );
		$lcc_support_section03_text02 = isset($opt['section03_text02']) ? $opt['section03_text02']: __( 'Reason 3', 'lanpa' );
		$lcc_support_section03_text03 = isset($opt['section03_text03']) ? $opt['section03_text03']: __('Summarize Reason 3' , 'lanpa');
		$lcc_support_section03_text04 = isset($opt['section03_text04']) ? $opt['section03_text04']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
		$lcc_support_section03_text05 = isset($opt['section03_text05']) ? $opt['section03_text05']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
		
		//solution
		$lcc_resolution_title = isset($opt['resolution_title']) ? $opt['resolution_title']: __( 'Your Solution', 'lanpa');

		$lcc_resolution_name = isset($opt['resolution_name']) ? $opt['resolution_name']: __( 'Your Product Name', 'lanpa');
		
		$lcc_resolution_text01 = isset($opt['resolution_text01']) ? $opt['resolution_text01']: __( 'Summarize your solution', 'lanpa');
		$lcc_resolution_text02 = isset($opt['resolution_text02']) ? $opt['resolution_text02']: __( 'More details More detail More detail More detail More detail More detail More detail.', 'lanpa');
		
		$lcc_resolution_point_title = isset($opt['resolution_point_title']) ? $opt['resolution_point_title']: __( 'The differences from other competitive products.', 'lanpa');
		
		$lcc_resolution_point_text01 = isset($opt['resolution_point_text01']) ? $opt['resolution_point_text01']: __( 'Feature 1', 'lanpa');
		$lcc_resolution_point_text02 = isset($opt['resolution_point_text02']) ? $opt['resolution_point_text02']: __( 'Feature 2', 'lanpa');
		$lcc_resolution_point_text03 = isset($opt['resolution_point_text03']) ? $opt['resolution_point_text03']: __( 'Feature 3', 'lanpa');
		$lcc_resolution_point_text04 = isset($opt['resolution_point_text04']) ? $opt['resolution_point_text04']: __( 'Feature 4', 'lanpa');
		$lcc_resolution_point_text05 = isset($opt['resolution_point_text05']) ? $opt['resolution_point_text05']: __( 'Feature 5', 'lanpa');
		
		//testimonials
		$lcc_empathy_title = isset($opt['empathy_title']) ? $opt['empathy_title']: __( 'Testimonials', 'lanpa');

		$lcc_empathy_section01_text01 = isset($opt['empathy_section01_text01']) ? $opt['empathy_section01_text01']: __( 'Customer 1' , 'lanpa');
		$lcc_empathy_section01_text02 = isset($opt['empathy_section01_text02']) ? $opt['empathy_section01_text02']: __( 'Sophia, 30s' , 'lanpa');
		$lcc_empathy_section01_text03 = isset($opt['empathy_section01_text03']) ? $opt['empathy_section01_text03']: __( 'More details More detail More detail More detail More detail More detail More detail.', 'lanpa');

		$lcc_empathy_section02_text01 = isset($opt['empathy_section02_text01']) ? $opt['empathy_section02_text01']: __( 'Customer 2' , 'lanpa');
		$lcc_empathy_section02_text02 = isset($opt['empathy_section02_text02']) ? $opt['empathy_section02_text02']: __( 'Erika, 20s' , 'lanpa');
		$lcc_empathy_section02_text03 = isset($opt['empathy_section02_text03']) ? $opt['empathy_section02_text03']: __( 'More details More detail More detail More detail More detail More detail More detail.', 'lanpa');
		
		$lcc_empathy_section03_text01 = isset($opt['empathy_section03_text01']) ? $opt['empathy_section03_text01']: __( 'Customer 3' , 'lanpa');
		$lcc_empathy_section03_text02 = isset($opt['empathy_section03_text02']) ? $opt['empathy_section03_text02']: __( 'Jessica, 40s' , 'lanpa');
		$lcc_empathy_section03_text03 = isset($opt['empathy_section03_text03']) ? $opt['empathy_section03_text03']: __( 'More details More detail More detail More detail More detail More detail More detail.', 'lanpa');
		
		?>


				<input type="radio" name="menu" id="solution" checked>
				<div class="tab_box flex_box">
					<section class="box_item">
						<h3><?php _e( 'Solution Section', 'lanpa' ) ?></h3>
                        <p><?php _e( 'Change Solution Section contents.', 'lanpa' ) ?></p>
						<ul>
							<li>
								<label for="input_resolution_title"><span class="number">&#9312;</span>&nbsp;<?php _e( 'Title' , 'lanpa' ) ?></label>
								<div>
									<input name="lcc_showtext_options[resolution_title]" type="text" id="input_resolution_title" value="<?php echo esc_attr($lcc_resolution_title) ?>" class="regular-text" />
								</div>
							</li>
						</ul>
						<ul>
							<li>
								<label for="input_resolution_name"><span class="number">&#9313;</span>&nbsp;<?php _e( 'Main Title' , 'lanpa') ?></label>

								<input name="lcc_showtext_options[resolution_name]" type="text" id="input_resolution_name" value="<?php  echo esc_attr($lcc_resolution_name) ?>" class="regular-text" />
							</li>
							<li>
								<label for="input_resolution_text01"><span class="number">&#9314;</span>&nbsp;<?php _e( 'Subtitle' , 'lanpa') ?></label>

								<input name="lcc_showtext_options[resolution_text01]" type="text" id="input_resolution_text01" value="<?php  echo esc_attr($lcc_resolution_text01) ?>" class="regular-text" />
							</li>
							<li>
								<label for="input_resolution_text01"><span class="number">&#9315;</span>&nbsp;<?php _e( 'Text' , 'lanpa' ) ?></label>
								<textarea name="lcc_showtext_options[resolution_text02]" type="text" id="input_resolution_text02" class="regular-text"><?php  echo esc_html($lcc_resolution_text02) ?></textarea>
							</li>
						</ul>
						<ul>
							<li>
								<label for="input_point_title"><span class="number">&#9316;</span>&nbsp;<?php _e( 'Feature Title' , 'lanpa' ) ?></label>

								<input name="lcc_showtext_options[resolution_point_title]" type="text" id="input_point_title" value="<?php  echo esc_attr($lcc_resolution_point_title) ?>" class="regular-text" />
							</li>
							<li>
								<label for="input_point_text01"><span class="number">&#9317;</span>&nbsp;<?php _e( 'Feature No1' , 'lanpa') ?></label>

								<input name="lcc_showtext_options[resolution_point_text01]" type="text" id="input_point_text01" value="<?php  echo esc_attr($lcc_resolution_point_text01) ?>" class="regular-text" />
							</li>

							<li>
								<label for="input_point_text01"><span class="number">&#9318;</span>&nbsp;<?php _e( 'Feature No2' , 'lanpa') ?></label>

								<input name="lcc_showtext_options[resolution_point_text02]" type="text" id="input_point_text02" value="<?php  echo esc_attr($lcc_resolution_point_text02) ?>" class="regular-text" />
							</li>
							<li>
								<label for="input_point_text01"><span class="number">&#9319;</span>&nbsp;<?php _e( 'Feature No3' , 'lanpa') ?></label>

								<input name="lcc_showtext_options[resolution_point_text03]" type="text" id="input_point_text03" value="<?php  echo esc_attr($lcc_resolution_point_text03) ?>" class="regular-text" />
							</li>
							<li>
								<label for="input_point_text01"><span class="number">&#9320;</span>&nbsp;<?php _e( 'Feature No4' , 'lanpa') ?></label>

								<input name="lcc_showtext_options[resolution_point_text04]" type="text" id="input_point_text04" value="<?php  echo esc_attr($lcc_resolution_point_text04) ?>" class="regular-text" />
							</li>
							<li>
								<label for="input_point_text01"><span class="number">&#9321;</span>&nbsp;<?php _e( 'Feature No5' , 'lanpa') ?></label>

								<input name="lcc_showtext_options[resolution_point_text05]" type="text" id="input_point_text05" value="<?php  echo esc_attr($lcc_resolution_point_text05) ?>" class="regular-text" />
							</li>
						</ul>
					</section>
					<div class="box_item">
						<img src="<?php echo plugins_url( 'lanpa-custom-contents/images/solution_mark.jpg', dirname( __FILE__ ) ); ?>">
					</div>
				</div>
				
					<input type="radio" name="menu" id="reason">
					<div class="tab_box flex_box">
						<section class="box_item">
							<h3><?php _e( 'Reason Section' , 'lanpa') ?></h3>
                            <p><?php _e( 'Change Reason Section contents.', 'lanpa' ) ?></p>
							<ul>
								<li>
									<label for="input_support_title"><span class="number">&#9312;</span>&nbsp;<?php _e( 'Main Title' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[support_title]" type="text" id="input_support_title" value="<?php  echo esc_attr($lcc_support_title) ?>" class="regular-text" />
								</li>
							</ul>
							<ul>
								<li>
									<label for="input_section01_text01"><span class="number">&#9313;</span>&nbsp;<?php _e( 'Ribbon Label' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section01_text01]" type="text" id="input_section01_text01" value="<?php  echo esc_attr($lcc_support_section01_text01) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section01_text02"><span class="number">&#9314;</span>&nbsp;<?php _e( 'Title' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section01_text02]" type="text" id="input_section01_text02" value="<?php  echo esc_attr($lcc_support_section01_text02) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section01_text03"><span class="number">&#9315;</span>&nbsp;<?php _e( 'Subtitle' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section01_text03]" type="text" id="input_section01_text03" value="<?php  echo esc_attr($lcc_support_section01_text03) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section01_text04"><span class="number">&#9316;</span>&nbsp;<?php _e( 'Text' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[section01_text04]" type="text" id="input_section01_text04" class="regular-text"><?php  echo esc_html($lcc_support_section01_text04) ?></textarea>
								</li>
								<li>
									<label for="input_section01_text05"><span class="number">&#9317;</span>&nbsp;<?php _e( 'Text 2' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[section01_text05]" type="text" id="input_section01_text05" class="regular-text"><?php  echo esc_html($lcc_support_section01_text05) ?></textarea>
								</li>
							</ul>
							<ul>
								<li>
									<label for="input_section02_text01"><span class="number">&#9318;</span>&nbsp;<?php _e( 'Ribbon Label' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section02_text01]" type="text" id="input_section02_text01" value="<?php  echo esc_attr($lcc_support_section02_text01) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section02_text02"><span class="number">&#9319;</span>&nbsp;<?php _e( 'Title' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section02_text02]" type="text" id="input_section02_text02" value="<?php  echo esc_attr($lcc_support_section02_text02) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section02_text03"><span class="number">&#9320;</span>&nbsp;<?php _e( 'Subtitle' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section02_text03]" type="text" id="input_section02_text03" value="<?php  echo esc_attr($lcc_support_section02_text03) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section02_text04"><span class="number">&#9321;</span>&nbsp;<?php _e( 'Text' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[section02_text04]" type="text" id="input_section02_text04" class="regular-text"><?php  echo esc_html($lcc_support_section02_text04) ?></textarea>
								</li>
								<li>
									<label for="input_section02_text05"><span class="number">&#9322;</span>&nbsp;<?php _e( 'Text 2' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[section02_text05]" type="text" id="input_section02_text05" class="regular-text"><?php  echo esc_html($lcc_support_section02_text05) ?></textarea>
								</li>
							</ul>
							<ul>
								<li>
									<label for="input_section03_text01"><span class="number">&#9323;</span>&nbsp;<?php _e( 'Ribbon Label' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section03_text01]" type="text" id="input_section03_text01" value="<?php  echo esc_attr($lcc_support_section03_text01) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section03_text02"><span class="number">&#9324;</span>&nbsp;<?php _e( 'Title' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section03_text02]" type="text" id="input_section03_text02" value="<?php  echo esc_attr($lcc_support_section03_text02) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section03_text03"><span class="number">&#9325;</span>&nbsp;<?php _e( 'Subtitle' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[section03_text03]" type="text" id="input_section03_text03" value="<?php  echo esc_attr($lcc_support_section03_text03) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_section03_text04"><span class="number">&#9326;</span>&nbsp;<?php _e( 'Text' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[section03_text04]" type="text" id="input_section03_text04" class="regular-text"><?php  echo esc_html($lcc_support_section03_text04) ?></textarea>
								</li>
								<li>
									<label for="input_section03_text05"><span class="number">&#9327;</span>&nbsp;<?php _e( 'Text 2' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[section03_text05]" type="text" id="input_section03_text05" class="regular-text"><?php  echo esc_html($lcc_support_section03_text05) ?></textarea>
								</li>
							</ul>
						</section>
						<div class="box_item">
							<img src="<?php echo plugins_url( 'lanpa-custom-contents/images/reason_mark.jpg', dirname( __FILE__ ) ); ?>">
						</div>
					</div>

					<input type="radio" name="menu" id="testimonials">
					<div class="tab_box flex_box">
						<section class="box_item">
							<h3><?php _e( 'Testimonials Section' , 'lanpa') ?></h3>
                            <p><?php _e( 'Change Testimonials Section contents.', 'lanpa' ) ?></p>
							<ul>
								<li>
									<label for="input_empathy_title"><span class="number">&#9312;</span>&nbsp;<?php _e( 'Title' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[empathy_title]" type="text" id="input_empathy_title" value="<?php echo esc_attr($lcc_empathy_title) ?>" class="regular-text" />
								</li>
							</ul>
							<ul>
								<li>
									<label for="input_empathy_section01_text01"><span class="number">&#9313;</span>&nbsp;<?php _e( 'Title' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[empathy_section01_text01]" type="text" id="input_empathy_section01_text01" value="<?php echo esc_attr($lcc_empathy_section01_text01) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_empathy_section01_text02"><span class="number">&#9314;</span>&nbsp;<?php _e( 'Name' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[empathy_section01_text02]" type="text" id="input_empathy_section01_text02" value="<?php echo esc_attr($lcc_empathy_section01_text02) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_empathy_section01_text03"><span class="number">&#9315;</span>&nbsp;<?php _e( 'Text' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[empathy_section01_text03]" type="text" id="input_empathy_section01_text03" class="regular-text"><?php  echo esc_html($lcc_empathy_section01_text03) ?></textarea>
								</li>
							</ul>
							<ul>
								<li>
									<label for="input_empathy_section02_text01"><span class="number">&#9316;</span>&nbsp;<?php _e( 'Title' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[empathy_section02_text01]" type="text" id="input_empathy_section02_text01" value="<?php echo esc_attr($lcc_empathy_section02_text01) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_empathy_section02_text02"><span class="number">&#9317;</span>&nbsp;<?php _e( 'Name' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[empathy_section02_text02]" type="text" id="input_empathy_section02_text02" value="<?php echo esc_attr($lcc_empathy_section02_text02) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_empathy_section02_text03"><span class="number">&#9318;</span>&nbsp;<?php _e( 'Text' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[empathy_section02_text03]" type="text" id="input_empathy_section02_text03" class="regular-text"><?php  echo esc_html($lcc_empathy_section02_text03) ?></textarea>
								</li>
							</ul>
							<ul>
								<li>
									<label for="input_empathy_section03_text01"><span class="number">&#9319;</span>&nbsp;<?php _e( 'Title' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[empathy_section03_text01]" type="text" id="input_empathy_section03_text01" value="<?php echo esc_attr($lcc_empathy_section03_text01) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_empathy_section03_text02"><span class="number">&#9320;</span>&nbsp;<?php _e( 'Name' , 'lanpa') ?></label>

									<input name="lcc_showtext_options[empathy_section03_text02]" type="text" id="input_empathy_section03_text02" value="<?php echo esc_attr($lcc_empathy_section03_text02) ?>" class="regular-text" />
								</li>
								<li>
									<label for="input_empathy_section03_text03"><span class="number">&#9321;</span>&nbsp;<?php _e( 'Text' , 'lanpa') ?></label>
									<textarea name="lcc_showtext_options[empathy_section03_text03]" type="text" id="input_empathy_section03_text03"><?php echo esc_html($lcc_empathy_section03_text03) ?></textarea>
								</li>
							</ul>
						</section>
						<div class="box_item">
							<img src="<?php echo plugins_url( 'lanpa-custom-contents/images/testimonials_mark.jpg', dirname( __FILE__ ) ); ?>" >
						</div>
					</div>

					<p class="submit">
						<input type="submit" name="Submit" class="button-primary" value="SAVE" />
					</p>





			</form>
		</div>
		<?php
	}
	//Reasons title
	function lcc_get_support_title() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['support_title']) ? $opt['support_title']: __( 'Reasons' , 'lanpa');
	}
	//Section01
	function lcc_get_section01_text01() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section01_text01']) ? $opt['section01_text01']: __( 'Reason 1', 'lanpa');
	}
	function lcc_get_section01_text02() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section01_text02']) ? $opt['section01_text02']: __( 'Reason 1', 'lanpa');
	}
	function lcc_get_section01_text03() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section01_text03']) ? $opt['section01_text03']: __( 'Summarize Reason 1', 'lanpa' );
	}
	function lcc_get_section01_text04() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section01_text04']) ? $opt['section01_text04']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
	}
	function lcc_get_section01_text05() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section01_text05']) ? $opt['section01_text05']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
	}
	//Section02
	function lcc_get_section02_text01() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section02_text01']) ? $opt['section02_text01']: __( 'Reason 2', 'lanpa' );
	}
	function lcc_get_section02_text02() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section02_text02']) ? $opt['section02_text02']: __( 'Reason 2', 'lanpa' );
	}
	function lcc_get_section02_text03() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section02_text03']) ? $opt['section02_text03']: __('Summarize Reason 2' , 'lanpa');
	}
	function lcc_get_section02_text04() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section02_text04']) ? $opt['section02_text04']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
	}
	function lcc_get_section02_text05() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section02_text05']) ? $opt['section02_text05']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
	}
	//Section03
	function lcc_get_section03_text01() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section03_text01']) ? $opt['section03_text01']: __( 'Reason 3', 'lanpa' );
	}
	function lcc_get_section03_text02() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section03_text02']) ? $opt['section03_text02']: __( 'Reason 3', 'lanpa' );
	}
	function lcc_get_section03_text03() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section03_text03']) ? $opt['section03_text03']: __('Summarize Reason 3' , 'lanpa');
	}
	function lcc_get_section03_text04() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section03_text04']) ? $opt['section03_text04']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
	}
	function lcc_get_section03_text05() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['section03_text05']) ? $opt['section03_text05']: __( 'More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail More Detail.', 'lanpa');
	}

	
	//Solution
	function lcc_get_resolution_title() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_title']) ? $opt['resolution_title']: __( 'Your Solution', 'lanpa');
	}
	function lcc_get_resolution_name() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_name']) ? $opt['resolution_name']: __( 'Your Product Name', 'lanpa');
	}
	function lcc_get_resolution_text01() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_text01']) ? $opt['resolution_text01']: __( 'Summarize your solution', 'lanpa');
	}
	function lcc_get_resolution_text02() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_text02']) ? $opt['resolution_text02']: __( 'More details More detail More detail More detail More detail More detail More detail.', 'lanpa');
	}
	function lcc_get_resolution_point_title() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_point_title']) ? $opt['resolution_point_title']: __( 'The differences from other competitive products.', 'lanpa');
	}
	function lcc_get_resolution_point_text01() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_point_text01']) ? $opt['resolution_point_text01']: __( 'Feature 1', 'lanpa');
	}
	function lcc_get_resolution_point_text02() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_point_text02']) ? $opt['resolution_point_text02']: __( 'Feature 2', 'lanpa');
	}
	function lcc_get_resolution_point_text03() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_point_text03']) ? $opt['resolution_point_text03']: __( 'Feature 3', 'lanpa');
	}
	function lcc_get_resolution_point_text04() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_point_text04']) ? $opt['resolution_point_text04']: __( 'Feature 4', 'lanpa');
	}
	function lcc_get_resolution_point_text05() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['resolution_point_text05']) ? $opt['resolution_point_text05']: __( 'Feature 5', 'lanpa');
	}
	
	
	//Reasons title
	function lcc_get_empathy_title() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_title']) ? $opt['empathy_title']: __( 'Testimonials', 'lanpa');
	}
	//Section01
	function lcc_get_empathy_section01_text01() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section01_text01']) ? $opt['empathy_section01_text01']: __( 'Customer 1' , 'lanpa');
	}
	function lcc_get_empathy_section01_text02() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section01_text02']) ? $opt['empathy_section01_text02']: __( 'Sophia, 30s' , 'lanpa');
	}
	function lcc_get_empathy_section01_text03() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section01_text03']) ? $opt['empathy_section01_text03']: __( 'More details More detail More detail More detail More detail More detail More detail.', 'lanpa');
	}
	//Section02
	function lcc_get_empathy_section02_text01() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section02_text01']) ? $opt['empathy_section02_text01']: __( 'Customer 2' , 'lanpa');
	}
	function lcc_get_empathy_section02_text02() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section02_text02']) ? $opt['empathy_section02_text02']: __( 'Erika, 20s' , 'lanpa');
	}
	function lcc_get_empathy_section02_text03() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section02_text03']) ? $opt['empathy_section02_text03']: __( 'More details More detail More detail More detail More detail More detail More detail.', 'lanpa');
	}
	//Section03
	function lcc_get_empathy_section03_text01() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section03_text01']) ? $opt['empathy_section03_text01']: __( 'Customer 3' , 'lanpa');
	}
	function lcc_get_empathy_section03_text02() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section03_text02']) ? $opt['empathy_section03_text02']: __( 'Jessica, 40s' , 'lanpa');
	}
	function lcc_get_empathy_section03_text03() {
		$opt = get_option('lcc_showtext_options');
		return isset($opt['empathy_section03_text03']) ? $opt['empathy_section03_text03']: __( 'More details More detail More detail More detail More detail More detail More detail.', 'lanpa');
	}
	
	
}
$lcc_showtext = new lccshowtext;
$lcc_showtext;


?>