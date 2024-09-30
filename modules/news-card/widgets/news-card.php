<?php
/**
 * News Card Widget file
 *
 * @category   Widget
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Modules\NewsCard\Widgets;

use CodexShaper\ElementBucket\Base\Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * News Card widget class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class News_Card extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-news-card';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB News Card', 'element-bucket' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-slider';
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'News Card', 'CodexShaper', 'Element Bucket' );
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'element-bucket' );
	}

	/**
	 * Get style dependencies.
	 *
	 * Retrieve the list of style dependencies the widget requires.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget style dependencies.
	 */
	public function get_style_depends(): array {
		return array( 'eb-widget-news-card' );
	}

	/**
	 * Get script dependencies.
	 *
	 * Retrieve the list of script dependencies the element requires.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Element scripts dependencies.
	 */
	public function get_script_depends() {
		return array( 'eb-swiper' );
	}

	/**
	 * Register Elementor widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 *
	 * @return void
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'settings_section',
			array(
				'label' => __( 'General Settings', 'element-bucket' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'author',
			array(
				'label'   => __( 'Author', 'element-bucket' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'by CodeXshaper LLC.', 'element-bucket' ),
			)
		);
		$repeater->add_control(
			'date',
			array(
				'label'   => __( 'Date', 'element-bucket' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( '17 September,2024', 'element-bucket' ),
			)
		);
		$repeater->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'element-bucket' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'The Industry Squirms, as It Gets as What It Asked For Done', 'element-bucket' ),
			)
		);
		$repeater->add_control(
			'image_button',
			array(
				'label'        => __( 'Image Hide Unhide', 'element-bucket' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'element-bucket' ),
				'label_off'    => __( 'No', 'element-bucket' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$repeater->add_control(
			'main_img',
			array(
				'label'       => __( 'Main Image', 'element-bucket' ),
				'type'        => Controls_Manager::MEDIA,
				'show_label'  => false,
				'description' => __( 'Main image', 'element-bucket' ),
				'default'     => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				'condition'   => array(
					'image_button' => 'yes',
				),
			)
		);
		$repeater->add_control(
			'main_button_control',
			array(
				'label'   => __( 'Button Hide Unhide', 'element-bucket' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'unhide' => __( 'Unhide', 'element-bucket' ),
					'hide'   => __( 'Hide', 'element-bucket' ),
				),
				'default' => 'unhide',
			)
		);
		$repeater->add_control(
			'button_text',
			array(
				'label'     => __( 'Button Text', 'element-bucket' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( 'More Details', 'element-bucket' ),
				'condition' => array(
					'main_button_control' => 'unhide',
				),

			)
		);
		$repeater->add_control(
			'button_icon',
			array(
				'label'     => __( 'Button Icon', 'element-bucket' ),
				'type'      => Controls_Manager::ICONS,
				'condition' => array(
					'main_button_control' => 'unhide',
				),
			)
		);
		$repeater->add_control(
			'btn_link',
			array(
				'label'       => __( 'Add URL Link', 'element-bucket' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'element-bucket' ),
				'description' => __( 'Enter the URL HERE', 'element-bucket' ),
				'default'     => array(
					'url' => '#',
				),
				'condition'   => array(
					'main_button_control' => 'unhide',
				),
			)
		);

		$repeater->add_control(
			'details_position',
			array(
				'label'   => __( 'Details Info Position', 'element-bucket' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'left'  => __( 'Left', 'element-bucket' ),
					'right' => __( 'Right', 'element-bucket' ),
				),
				'default' => 'left',
			)
		);

		$this->add_control(
			'items',
			array(
				'label'   => __( 'News Card', 'element-bucket' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'main_img' => array(
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						),
					),
				),
			)
		);

		$this->end_controls_section();

		// Style tab start.
		$this->start_controls_section(
			'styling_section',
			array(
				'label' => __( 'Styling Settings', 'element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'author_typography',
				'label'    => __( 'Author Typography', 'element-bucket' ),
				'selector' => '{{WRAPPER}} .cat',
			)
		);
		$this->add_control(
			'author_color',
			array(
				'label'     => __( 'Author Color', 'element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cat' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'author_background_color',
			array(
				'label'     => __( 'Author Background Color', 'element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cat' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'author_show_hr',
			array(
				'type'  => Controls_Manager::DIVIDER,
				'label' => __( 'author show hr', 'element-bucket' ),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'date_typography',
				'label'    => __( 'Date Typography', 'element-bucket' ),
				'selector' => '{{WRAPPER}} .date',
			)
		);
		$this->add_control(
			'date_color',
			array(
				'label'     => __( 'Date Color', 'element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .date' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'date_show_hr',
			array(
				'type'  => Controls_Manager::DIVIDER,
				'label' => __( 'date show hr', 'element-bucket' ),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'element-bucket' ),
				'selector' => '{{WRAPPER}} .title',
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'title_show_hr',
			array(
				'type'  => Controls_Manager::DIVIDER,
				'label' => __( 'title show hr', 'element-bucket' ),
			)
		);
		$this->end_controls_section();
		// Button Text.
		$this->start_controls_section(
			'button_text_color_styling',
			array(
				'label' => __( 'Button Text', 'element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'button_text_color_tab',
		);
			$this->start_controls_tab(
				'button_text_normal_tab',
				array(
					'label' => __( 'Normal', 'element-bucket' ),
				)
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				array(
					'name'      => 'button_text_typography',
					'label'     => __( 'Text Typography', 'element-bucket' ),
					'selectors' => array(
						'{{WRAPPER}} .read-more-btn-small',
					),
				)
			);
			$this->add_control(
				'button_text_color',
				array(
					'label'     => __( 'Text Color', 'element-bucket' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .read-more-btn-small' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'button_text_hover_tab',
				array(
					'label' => __( 'Hover', 'element-bucket' ),
				)
			);
			$this->add_control(
				'button_text_hover_color',
				array(
					'label'     => __( 'Text Color', 'element-bucket' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .read-more-btn-small:hover' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Card Background Color.
		$this->start_controls_section(
			'background',
			array(
				'label' => __( 'Card Background Color', 'element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'card_bg_color_tab',
		);
			$this->start_controls_tab(
				'card_bg_normal_tab',
				array(
					'label' => __( 'Normal', 'element-bucket' ),
				)
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				array(
					'name'     => 'card_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .single-blog-item',

				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'card_bg_hover_tab',
				array(
					'label' => __( 'Hover', 'element-bucket' ),
				)
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				array(
					'name'     => 'card_hover_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .single-blog-item:hover',
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Background Color.
		$this->start_controls_section(
			'button_background',
			array(
				'label' => __( 'Button Background', 'element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'button_bg_color_tab',
		);
			$this->start_controls_tab(
				'button_bg_normal_tab',
				array(
					'label' => __( 'Normal', 'element-bucket' ),
				)
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				array(
					'name'     => 'button_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .read-more-btn-small',

				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'button_bg_hover_tab',
				array(
					'label' => __( 'Hover', 'element-bucket' ),
				)
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				array(
					'name'     => 'button_hover_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .read-more-btn-small:hover',
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return void
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<div class="swiper blog-slider-1">
			<div class="swiper-wrapper">
				<?php if ( ! empty( $settings['items'] ) ) : ?>
					<?php foreach ( $settings['items'] as $item ) : ?>
						<?php
						if ( 'left' === $item['details_position'] ) :
							$classname = 'details-info';
						else :
							$classname = 'details-info-one';
						endif;
						?>
						<div class="swiper-slide">
							<article class="single-blog-item">
								<div class="thumb">
									<?php if ( ! empty( $item['main_img']['url'] ) && 'yes' === $item['image_button'] ) : ?>
										<img class="w-100" src="<?php echo esc_url( $item['main_img']['url'] ); ?>" alt="img">
									<?php endif; ?>
								</div>
								<div class="details">
									<ul class="meta-info">
										<?php if ( ! empty( $item['author'] ) ) : ?>
											<li class="cat"><?php echo esc_html( $item['author'] ); ?></li>
										<?php endif; ?>
										<?php if ( ! empty( $item['date'] ) ) : ?>
											<li class="date">
												<?php echo esc_html( $item['date'] ); ?>
											</li>
										<?php endif; ?>
									</ul>
									<div class="<?php echo esc_attr( $classname ); ?>">
										<?php if ( ! empty( $item['title'] ) ) : ?>
											<h3 class="title"><?php echo esc_html( $item['title'] ); ?></h3>
										<?php endif; ?>
										<?php if ( ! empty( $item['button_text'] ) && 'unhide' === $item['main_button_control'] ) : ?>
											<?php
											if ( ! empty( $item['button_icon'] ) ) {
												$icon = \Elementor\Icons_Manager::try_get_icon_html(
													$item['button_icon'],
													array(
														'aria-hidden' => 'true',
														'fill'        => 'currentColor',
														'width'       => '16',
													)
												);
											}
											?>
											<a class="read-more-btn-small" href="<?php echo esc_url( $item['btn_link']['url'] ); ?>">
												<?php echo esc_html( $item['button_text'] ); ?>
												<?php echo wp_kses( $icon, get_eb_svg_rules() ); ?>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</article>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="slider-bottom-pagination-wrap">
				<div class="blog-slider-pagination slider-bottom-pagination"></div>
			</div>
		</div>

		<?php
	}
}
