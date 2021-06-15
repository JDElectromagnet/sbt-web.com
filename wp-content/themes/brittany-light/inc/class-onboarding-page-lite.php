<?php
	class Brittany_Light_Onboarding_Page_Lite extends Brittany_Light_Onboarding_Page {
		/**
		 * Populate the support tab
		 *
		 * @return void
		 */
		public function upgrade_pro() {
			?>
			<h3><?php echo wp_kses( __( 'Did you know there is a <strong>pro</strong> version?', 'brittany-light' ), brittany_light_get_allowed_tags() ); ?></h3>
			<div class="three-col">
				<table class="brittany-light-onboarding-table">
					<tr>
						<th class="brittany-light-onboarding-feature"></th>
						<th class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'Light', 'brittany-light' ); ?></th>
						<th class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Pro', 'brittany-light' ); ?></th>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( '24/7 Support', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'Responsive Layout', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'Documentation', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'Upload Your Own Logo', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'Social Networking Options', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'WooCommerce Support', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'No', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'Color Customization Options', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'No', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'Translation Ready', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( '1, 2, 3 & 4 Column Layout Options With Alternative Blog Post Appearance Options', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'No', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'Widgetized Homepage template with Slider', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'No', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"><?php esc_html_e( 'Page Builder Support', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"><?php esc_html_e( 'No', 'brittany-light' ); ?></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-pro"><?php esc_html_e( 'Yes', 'brittany-light' ); ?></td>
					</tr>
					<tr>
						<td class="brittany-light-onboarding-feature"></td>
						<td class="brittany-light-onboarding-col brittany-light-onboarding-lite"></td>
						<td class="brittany-light-onboarding-col">
							<a href="https://www.cssigniter.com/themes/brittany/" class="button button-primary button-action" target="_blank"><?php esc_html_e( 'Upgrade Today!', 'brittany-light' ); ?></a>
						</td>
					</tr>
				</table>
			</div>
			<?php
		}
	}

